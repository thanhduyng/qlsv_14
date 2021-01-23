<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManhinhQuantriController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user = auth()->user();
            $quanTri = DB::table('qlsv_nguoidungquantris')
                ->where('id_user', $user->id)
                ->get();

            if (count($quanTri) == 0) {
                exit;
            }
            return $next($request);
        });
    }

    public function trangchu(Request $request)
    {
        $user = auth()->user();
        $quanTri = DB::table('qlsv_nguoidungquantris')
            ->where('id_user', $user->id)
            ->get()[0];

        // dd($quanTri);
        $tenQt = explode(' ', $quanTri->ten);
        $title = "Xin chào: " . $tenQt[count($tenQt) - 1];
        DB::enableQueryLog();
     
        return view('ManHinhQuanTri.trangchu', compact(['title']));
    }

}