<?php

namespace App\Http\Controllers\SinhVien;

use App\Http\Controllers\Controller;
use App\qlsv_lophoc;
use App\qlsv_thoikhoabieu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManhinhSinhvienController extends Controller
{
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
        // DB::enableQueryLog();
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
        $title = "Điểm Thi";
        $idlop = $request->get('id_lophoc');

    
        $qlsv_lophoc = qlsv_lophoc::find($idlop);
        // dd($qlsv_lophoc);
        $id_thoikhoabieu = $request->get('id_thoikhoabieu');
        $thoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);

        $findThoiKhoaBieu = qlsv_thoikhoabieu::find($id_thoikhoabieu);

        $qlsv_sinhvienlophoc = DB::table('qlsv_sinhvienlophocs')
            ->join('qlsv_sinhviens', 'qlsv_sinhviens.id', '=', 'qlsv_sinhvienlophocs.id_sinhvien')
            ->leftJoin('qlsv_diemthis', 'qlsv_diemthis.id_sinhvienlophoc', '=', 'qlsv_sinhvienlophocs.id')
            ->where('qlsv_sinhvienlophocs.id_lophoc', $idlop)
            ->where('qlsv_sinhviens.deleted_at', 0)
            ->select('qlsv_sinhvienlophocs.*', 'qlsv_sinhviens.id', 'qlsv_sinhviens.hovaten', 'qlsv_diemthis.id_sinhvienlophoc', 'qlsv_diemthis.*')
            ->get();

         return view('ManHinhSinhVien.viewdiemthi', compact(
            ['title','idlop','qlsv_lophoc','thoiKhoaBieu','id_thoikhoabieu','findThoiKhoaBieu','qlsv_sinhvienlophoc']
        ));
    }

}
