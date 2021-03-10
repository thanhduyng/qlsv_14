<?php

namespace App\Http\Controllers\SinhVien;

use App\Http\Controllers\Controller;
use App\qlsv_lophoc;
use App\qlsv_sinhvien;
use App\qlsv_sinhvienlophoc;
use App\qlsv_thoikhoabieu;
use App\qlsv_xinnghi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManhinhSinhvienController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user = auth()->user();
            $sinhVien = DB::table('qlsv_sinhviens')
                ->where('id_user', $user->id)
                ->get();

            if (count($sinhVien) == 0) {
                exit;
            }

            return $next($request);
        });
    }


    public function index(Request $request)
    {
        $title = "Trang chủ của Sinh viên";
        return view('ManHinhSinhVien.index', compact(['title']));
    }
    public function trangchu(Request $request)
    {
        $user = auth()->user();
        $sinhVien = DB::table('qlsv_sinhviens')
            ->where('id_user', $user->id)
            ->get()[0];

        // $tenSv = explode(' ', $sinhVien->hovaten);
        // dd($tenSv);
        // $title = "Xin chào " . $tenSv[count($tenSv) - 1];
        $title = "Xin chào: " . $sinhVien->hovaten;
        // dd($title);

        // dd($sinhVien);
        DB::enableQueryLog();
        $lopHoc = DB::table('qlsv_sinhvienlophocs')
            ->where('id_sinhvien', $sinhVien->id)
            ->orderByDesc('id')
            ->select(
                'qlsv_sinhvienlophocs.*',
                DB::raw('(select id from qlsv_thoikhoabieus 
            where qlsv_thoikhoabieus.id_lophoc = qlsv_sinhvienlophocs.id_lophoc order by case when ngayhoc >= \'' . Carbon::now()->format("Y-m-d") .
                    '\' then 0 else 1 end,case when ngayhoc <= \'' . Carbon::now()->format("Y-m-d") .
                    ' 23:59:59\' then 0 else 1 end desc, id limit 1) as id_thoikhoabieu ')
            )
            ->get();
        // dd(DB::getQueryLog());
        // dd($lopHoc);
        return view('ManHinhSinhVien.trangchu', compact(['title', 'lopHoc', 'sinhVien']));
    }


    public function viewdiemthi(Request $request)
    {
        $user = auth()->user();
        $sinhVien = DB::table('qlsv_sinhviens')
            ->where('id_user', $user->id)
            ->get()[0];

        $title = "Điểm Thi";
        $idlop = $request->get('id_lophoc');

        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        // dd($qlsv_lophoc);
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');
        $thoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        DB::enableQueryLog();
        $qlsv_sinhvienlophoc = DB::table('qlsv_sinhvienlophocs')
            ->join('qlsv_sinhviens', 'qlsv_sinhviens.id', '=', 'qlsv_sinhvienlophocs.id_sinhvien')
            ->leftJoin('qlsv_diemthis', 'qlsv_diemthis.id_sinhvienlophoc', '=', 'qlsv_sinhvienlophocs.id')
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->where('qlsv_sinhviens.deleted_at', 0)
            ->select('qlsv_sinhviens.hovaten', 'qlsv_sinhvienlophocs.id', 'qlsv_diemthis.diemthuchanh', 'qlsv_diemthis.diemlythuyet')
            ->get();
        // dd(DB::getQueryLog());

        // dd($qlsv_sinhvienlophoc);
        return view('ManHinhSinhVien.viewdiemthi', compact(
            ['title', 'idlop', 'qlsv_lophoc', 'thoiKhoaBieu', 'id_thoikhoabieu', 'findThoiKhoaBieu', 'qlsv_sinhvienlophoc']
        ));
    }

    public function viewdiemdanh(Request $request)
    {
        $user = auth()->user();
        $title = "Nhật ký điểm danh";
        $idlop = $request->get('id_lophoc');
        $idsinhvien = $request->get('id_sinhvien');
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');
        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        $qlsv_lophoc = qlsv_lophoc::find($idlop);

        DB::enableQueryLog();
        $qlsv_sinhvienlophoc = DB::table('qlsv_diemdanhs')
            ->select('qlsv_sinhvienlophocs.id_sinhvien', 'qlsv_diemdanhs.denlop', 'qlsv_thoikhoabieus.id_Lophoc', 'qlsv_thoikhoabieus.id', 'qlsv_thoikhoabieus.ngayhoc')
            ->join('qlsv_thoikhoabieus', 'qlsv_thoikhoabieus.id', '=', 'qlsv_diemdanhs.id_thoikhoabieu')
            ->leftJoin('qlsv_sinhvienlophocs', 'qlsv_sinhvienlophocs.id', '=', 'qlsv_diemdanhs.id_sinhvienlophoc')
            ->where('qlsv_sinhvienlophocs.id_sinhvien', $idsinhvien)
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->get();
        // dd(DB::getQueryLog());

        $vang = DB::table('qlsv_diemdanhs')
            ->selectRaw('count(qlsv_thoikhoabieus.ngayhoc) as vang')
            ->join('qlsv_thoikhoabieus', 'qlsv_thoikhoabieus.id', '=', 'qlsv_diemdanhs.id_thoikhoabieu')
            ->leftJoin('qlsv_sinhvienlophocs', 'qlsv_sinhvienlophocs.id', '=', 'qlsv_diemdanhs.id_sinhvienlophoc')
            ->where('qlsv_sinhvienlophocs.id_sinhvien', $idsinhvien)
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->where('qlsv_diemdanhs.denlop', '>', 1)
            ->get();

        // dd(DB::getQueryLog());
        return view('ManHinhSinhVien.viewdiemdanh', compact(['vang', 'findThoiKhoaBieu', 'id_thoikhoabieu', 'title', 'idlop', 'qlsv_lophoc', 'qlsv_sinhvienlophoc']));
    }

    public function chonlop(Request $request)
    {
        $title = "Xin nghỉ theo lớp";
        $user = auth()->user();
        $sinhVien = DB::table('qlsv_sinhviens')
            ->where('id_user', $user->id)
            ->get()[0];
        DB::enableQueryLog();
        $lopHoc = DB::table('qlsv_sinhvienlophocs')
            ->where('id_sinhvien', $sinhVien->id)
            ->orderByDesc('id')
            ->select(
                'qlsv_sinhvienlophocs.*'
            )
            ->get();
        // dd(DB::getQueryLog());
        return view('ManHinhSinhVien.chonlop', compact(['title', 'user', 'sinhVien', 'lopHoc']));
    }

    public function viewxinnghi(Request $request)
    {
        $user = auth()->user();
        $title = "Xin nghỉ theo lớp";
        $idlop = $request->get('id_lophoc');
        $idsinhvien = $request->get('id_sinhvien');
        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        $qlsv_sinhvien = qlsv_sinhvien::find($idsinhvien);

        DB::enableQueryLog();
        $qlsv_sinhvienlophoc = DB::table('qlsv_xinnghis')
            ->select('qlsv_sinhvienlophocs.id_sinhvien', 'qlsv_sinhvienlophocs.id_Lophoc', 'qlsv_xinnghis.id_sinhvienlophoc')
            ->join('qlsv_sinhvienlophocs', 'qlsv_sinhvienlophocs.id', '=', 'qlsv_xinnghis.id_sinhvienlophoc')
            ->where('qlsv_sinhvienlophocs.id_sinhvien', $idsinhvien)
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->get();
        // dd(DB::getQueryLog());
        return view('ManHinhSinhVien.viewxinnghi', compact(['qlsv_sinhvien','title', 'idlop', 'qlsv_lophoc', 'qlsv_sinhvienlophoc']));
    }

    public function storexinnghi(Request $request)
    {
        $sinhVienLopHoc = new qlsv_sinhvienlophoc();
        $sinhVienLopHoc->id_lophoc = $request->id_lophoc;
        $sinhVienLopHoc->id_sinhvien = $request->id_sinhvien;
        $sinhVienLopHoc->save();

        $xinNghi = new qlsv_xinnghi();
        $xinNghi->ngaynghi = $request->ngaynghi;
        $xinNghi->canghi = $request->canghi;
        $xinNghi->noidung = $request->noidung;
        $xinNghi->lydo = $request->lydo;
        $xinNghi->id_sinhvienlophoc = $sinhVienLopHoc->id;
        $user = auth()->user();
        $xinNghi->nguoitao = $user->name;
        $xinNghi->created_at = Carbon::now();
        $xinNghi->deleted_at = "0";
        $xinNghi->save();
        return redirect()->route('sinh_vien.index');
    }
}
