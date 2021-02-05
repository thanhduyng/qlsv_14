<?php

namespace App\Http\Controllers\GiangVien;

use App\Http\Controllers\Controller;
use App\qlsv_diemdanh;
use App\qlsv_diemthi;
use App\qlsv_giangvien;
use App\qlsv_lophoc;
use App\qlsv_phonghoc;
use App\qlsv_thoikhoabieu;
use App\qlsv_worktask;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManhinhGiangvienController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user = auth()->user();
            $giangVien = DB::table('qlsv_giangviens')
                ->where('id_user', $user->id)
                ->get();

            if (count($giangVien) == 0) {
                exit;
            }
           
            return $next($request);
        });
    }

    public function trangchu(Request $request)
    {
        $user = auth()->user();
        $giangVien = DB::table('qlsv_giangviens')
            ->where('id_user', $user->id)
            ->get()[0];

        // dd($giangVien);
        $tenGv = explode(' ', $giangVien->hovaten);
        $title = "Xin chào Thầy/Cô: " . $tenGv[count($tenGv) - 1];
        DB::enableQueryLog();
        $lopHoc = DB::table('qlsv_lophocs')
            ->where('id_giangvien', $giangVien->id)
            ->orderByDesc('id')
            ->select(
                'qlsv_lophocs.*',
                DB::raw('(select id from qlsv_thoikhoabieus 
                where qlsv_thoikhoabieus.id_lophoc = qlsv_lophocs.id order by case when ngayhoc >= \'' . Carbon::now()->format("Y-m-d") .
                    '\' then 0 else 1 end,case when ngayhoc <= \'' . Carbon::now()->format("Y-m-d") .
                    ' 23:59:59\' then 0 else 1 end desc, id limit 1) as id_thoikhoabieu ')
            )
            ->get();
        // dd(DB::getQueryLog());

        // dd($lopHoc);

        return view('ManHinhGiangVien.trangchu', compact(['title', 'lopHoc']));
    }

    public function viewdiemdanh(Request $request)
    {
        $title = "Điểm Danh";
        $idlop = $request->get('id_lophoc');
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');
        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        if ($idlop != $findThoiKhoaBieu->id_lophoc) {
            exit;
        }
        DB::enableQueryLog();
        $qlsv_sinhvienlophoc = DB::table('qlsv_sinhvienlophocs')
            ->join('qlsv_sinhviens', 'qlsv_sinhviens.id', '=', 'qlsv_sinhvienlophocs.id_sinhvien')
            ->leftJoin('qlsv_diemdanhs', function ($join) use ($id_thoikhoabieu) {
                $join->on('qlsv_diemdanhs.id_sinhvienlophoc', '=', 'qlsv_sinhvienlophocs.id')
                    ->on('qlsv_diemdanhs.id_thoikhoabieu', '=', DB::raw($id_thoikhoabieu));
            })
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->where('qlsv_sinhviens.deleted_at', 0)
            ->select('qlsv_sinhvienlophocs.id as id_svlh',  'qlsv_sinhviens.hovaten', 'qlsv_diemdanhs.*')
            ->get();
        // dd($qlsv_sinhvienlophoc);
        // dd(DB::getQueryLog());

        $thoiKhoaBieu = DB::table('qlsv_thoikhoabieus')->where('id_lophoc', $idlop)
            ->select(DB::raw("concat(ngayhoc ,' - ' , case when cahoc=1 then 'Sáng' when cahoc=2 then 'Chiều' when cahoc=3 then 'Tối' end) as ngayhoc, id"))
            ->pluck('ngayhoc', 'id');
        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        $user = auth()->user();
        $giangVien = DB::table('qlsv_giangviens')
            ->where('id_user', $user->id)
            ->get()[0];
        if ($qlsv_lophoc->id_giangvien != $giangVien->id) {
            exit;
        }
        // dd($thoiKhoaBieu);
        //dd(DB::getQueryLog());
        return view('ManHinhGiangVien.viewdiemdanh', compact(
            ['idlop', 'thoiKhoaBieu', 'qlsv_sinhvienlophoc', 'qlsv_lophoc', 'title', 'id_thoikhoabieu']
        ));
    }

    public function viewnhatky(Request $request)
    {
        $user = auth()->user();
        $giangVien = DB::table('qlsv_giangviens')
            ->where('id_user', $user->id)
            ->get()[0];

        $title = "Nhật Ký Lên Lớp";
        $idlop = $request->get('id_lophoc');
        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');

        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        if ($idlop != $findThoiKhoaBieu->id_lophoc) {
            exit;
        }

        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        $phongHoc = qlsv_phonghoc::pluck('tenphonghoc', 'id');
        $workTask = qlsv_worktask::pluck('tenworktask', 'id');

        DB::enableQueryLog();
        $thoiKhoaBieuall = DB::table('qlsv_thoikhoabieus')->where('id_lophoc', $idlop)
            ->select(DB::raw("concat(ngayhoc ,' - ' , case when cahoc=1 then 'Sáng' when cahoc=2 then 'Chiều' when cahoc=3 then 'Tối' end) as ngayhoc, id"))
            ->pluck('ngayhoc', 'id');

        if ($qlsv_lophoc->id_giangvien != $giangVien->id) {
            exit;
        }

        // dd(DB::getQueryLog());
        $thoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        return view('ManHinhGiangVien.viewnhatky', compact(
            ['idlop', 'title', 'qlsv_lophoc', 'phongHoc', 'id_thoikhoabieu', 'workTask', 'thoiKhoaBieu', 'thoiKhoaBieuall']
        ));
    }

    public function viewdiemthi(Request $request)
    {
        $user = auth()->user();
        $giangVien = DB::table('qlsv_giangviens')
            ->where('id_user', $user->id)
            ->get()[0];

        $title = "Điểm Thi";
        $idlop = $request->get('id_lophoc');
        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');
        $thoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);

        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);
        if ($idlop != $findThoiKhoaBieu->id_lophoc) {
            exit;
        }

        $qlsv_sinhvienlophoc = DB::table('qlsv_sinhvienlophocs')
            ->join('qlsv_sinhviens', 'qlsv_sinhviens.id', '=', 'qlsv_sinhvienlophocs.id_sinhvien')
            ->leftJoin('qlsv_diemthis', 'qlsv_diemthis.id_sinhvienlophoc', '=', 'qlsv_sinhvienlophocs.id')
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->where('qlsv_sinhviens.deleted_at', 0)
            ->select('qlsv_sinhviens.hovaten', 'qlsv_sinhvienlophocs.id','qlsv_diemthis.ghichu', 'qlsv_diemthis.diemthuchanh', 'qlsv_diemthis.diemlythuyet')
            ->get();
        // dd($qlsv_sinhvienlophoc);
        // $qlsv_lophoc = qlsv_lophoc::find($idlop);
        // $qlsv_lophoc = DB::table('qlsv_lophocs')->pluck('tenlophoc', 'id');
        $qlsv_kieuthi = DB::table('qlsv_kieuthis')->pluck('kieuthi', 'id');

        if ($qlsv_lophoc->id_giangvien != $giangVien->id) {
            exit;
        }

        return view('ManHinhGiangVien.viewdiemthi', compact(
            ['idlop', 'title', 'qlsv_lophoc', 'id_thoikhoabieu', 'thoiKhoaBieu', 'qlsv_sinhvienlophoc', 'qlsv_lophoc', 'qlsv_kieuthi']
        ));
    }

    public function storediemdanh(Request $request)
    {
        $id_sinhvienlophocs = $request['id_sinhvienlophoc'];

        $ngayhoc =  $request['ngayhoc'];

        $ghichu =  '';
        $idlop = $request['idlop'];

        for ($i = 0; $i < count($id_sinhvienlophocs); $i++) {
            $diemdanh = DB::table('qlsv_diemdanhs')
                ->where('id_sinhvienlophoc', '=', $id_sinhvienlophocs[$i])
                ->where('id_thoikhoabieu', '=', $ngayhoc)
                ->get();
            // dd($diemdanh);
            if (count($diemdanh) == 1) {
                $data = qlsv_diemdanh::find($diemdanh[0]->id);
                $data->denlop = $request[$id_sinhvienlophocs[$i] . '_denlop'] ?? 0;
                $data->kienthuc = $request[$id_sinhvienlophocs[$i] . '_kienthuc'] ?? 0;
                $data->thuchanh = $request[$id_sinhvienlophocs[$i] . '_thuchanh'] ?? 0;
                $data->ghichu = $ghichu;
                $data->id_thoikhoabieu = $ngayhoc;
                $data->save();
            } else {
                $data = new qlsv_diemdanh();
                $data->id_sinhvienlophoc = $id_sinhvienlophocs[$i];
                $data->denlop = $request[$id_sinhvienlophocs[$i] . '_denlop'] ?? 0;
                $data->kienthuc = $request[$id_sinhvienlophocs[$i] . '_kienthuc'] ?? 0;
                $data->thuchanh = $request[$id_sinhvienlophocs[$i] . '_thuchanh'] ?? 0;
                $data->ghichu = $ghichu;
                $data->id_thoikhoabieu = $ngayhoc;
                $data->save();
            }
        }

        return redirect()->route('giang_vien.trangchu');
    }
    public function storediemthi(Request $request)
    {
        $id_sinhvienlophocs =    $request['id_sinhvienlophoc'];
        //  dd($id_sinhvienlophocs);
        $diemlythuyets =  $request['diemlythuyet'];
        $diemthuchanhs =  $request['diemthuchanh'];
        $ghichu =  $request['ghichu'];
        $idlop = $request['idlop'];

        for ($i = 0; $i < count($id_sinhvienlophocs); $i++) {
            $diemthi = DB::table('qlsv_diemthis')
                ->where('id_sinhvienlophoc', '=', $id_sinhvienlophocs[$i])->get();
            //dd($diemthi);
            if (count($diemthi) == 1) {
                $data = qlsv_diemthi::find($diemthi[0]->id);
                $data->diemlythuyet = $diemlythuyets[$i];
                $data->diemthuchanh = $diemthuchanhs[$i];
                $data->ngaychodiem = Carbon::now("Asia/Ho_Chi_Minh");
                $data->ghichu = $ghichu[$i];
                $data->save();
            } else {
                $data = new qlsv_diemthi();
                $data->id_sinhvienlophoc = $id_sinhvienlophocs[$i];
                $data->diemlythuyet = $diemlythuyets[$i];
                $data->diemthuchanh = $diemthuchanhs[$i];
                $data->ghichu = $ghichu[$i];
                $data->ngaychodiem = Carbon::now("Asia/Ho_Chi_Minh");
                $data->id_kieuthi = 1;
                $data->deleted_at = 0;
                $data->save();
            }
        }
        return redirect()->route('giang_vien.trangchu');
    }

    public function storenhatky(Request $request)
    {
        $id_thoikhoabieu = $request['id_thoikhoabieu'];
        $ghichu = $request['ghichu'];
        $id_phonghoc = $request['id_phonghoc'];
        $id_worktask = $request['id_worktask'];

        $giovao = $request['giovao'];
        $giobatdau = $request['giobatdau'];
        $danhgiagiovao = $request['danhgiagiovao'];
        $lydogiovao = $request['lydogiovao'];

        $giora = $request['giora'];
        $danhgiagiora = $request['danhgiagiora'];
        $lydogiora = $request['lydogiora'];

        $danhgiacuagiangvien = $request['danhgiacuagiangvien'];
        $loinhancuagiangvien = $request['loinhancuagiangvien'];
        $siso = $request['siso'];
        $buoithu = $request['buoithu'];
        $thuchientot = $request['thuchientot'];
        $khonglamduoc = $request['khonglamduoc'];

        for ($i = 0; $i < count($id_thoikhoabieu); $i++) {

            $nhatKy = DB::table('qlsv_thoikhoabieus')
                ->where('id', '=', $id_thoikhoabieu[$i])
                ->get();
            // dd($nhatKy);
            if (count($nhatKy) == 1) {
                DB::enableQueryLog();
                $data = qlsv_thoikhoabieu::find($nhatKy[0]->id);
                // dd(DB::getQueryLog());
                $data->id_phonghoc = $id_phonghoc;
                $data->id_worktask = $id_worktask;
                $data->ghichu = $ghichu;

                $data->giovao = $giovao;
                $data->giobatdau = $giobatdau;
                $data->danhgiagiovao = $danhgiagiovao ?? 0;
                $data->lydogiovao = $lydogiovao ?? 0;

                $data->giora = $giora;
                $data->danhgiagiora = $danhgiagiora ?? 0;
                $data->lydogiora = $lydogiora ?? 0;

                $data->danhgiacuagiangvien = $danhgiacuagiangvien;
                $data->loinhancuagiangvien = $loinhancuagiangvien;
                $data->siso = $siso;
                $data->buoithu = $buoithu;
                $data->thuchientot = $thuchientot;
                $data->khonglamduoc = $khonglamduoc;
                $data->save();
            } else {
                $data = new qlsv_thoikhoabieu();
                $data->id_sinhvienlophoc = $id_thoikhoabieu[$i];
                $data->ghichu = $ghichu;
                $data->id_phonghoc = $id_phonghoc;
                $data->id_worktask = $id_worktask;

                $data->giovao = $giovao;
                $data->giobatdau = $giobatdau;
                $data->danhgiagiovao = $danhgiagiovao ?? 0;
                $data->lydogiovao = $lydogiovao ?? 0;

                $data->giora = $giora;
                $data->danhgiagiora = $danhgiagiora ?? 0;
                $data->lydogiora = $lydogiora ?? 0;

                $data->danhgiacuagiangvien = $danhgiacuagiangvien;
                $data->loinhancuagiangvien = $loinhancuagiangvien;
                $data->siso = $siso;
                $data->buoithu = $buoithu;
                $data->thuchientot = $thuchientot;
                $data->khonglamduoc = $khonglamduoc;
                $data->save();
            }
        }
        return redirect()->route('giang_vien.trangchu');
    }
}
