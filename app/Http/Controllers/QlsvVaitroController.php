<?php

namespace App\Http\Controllers;

use App\qlsv_chucnang;
use App\qlsv_vaitro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QlsvVaitroController extends Controller
{
    private $qlsv_vaitro;
    private $qlsv_chucnang;
    public function __construct(qlsv_chucnang $qlsv_chucnang, qlsv_vaitro $qlsv_vaitro)
    {
        $this->qlsv_vaitro = $qlsv_vaitro;
        $this->qlsv_chucnang = $qlsv_chucnang;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Danh sách vai trò";
        $vaiTro = $this->qlsv_vaitro->all();
        return view('admin.VaiTro.dsvaitro', compact(['vaiTro','title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm vai trò";
        $chucNang = $this->qlsv_chucnang->all();

        // $chucNang = DB::table('qlsv_chucnangs as r')
        // ->select('r.id', 'r.id_cha', 'r.ma', 'r.ten')
        // ->join('qlsv_chucnangs as rp', 'r.id_cha', '=', 'rp.id')
        // ->where('r.id_cha', '!=', '-1')
        // ->orderBy('rp.ten', 'asc')
        // ->get();
        // dd($chucNang);
        return view('admin.VaiTro.themvaitro',compact(['title','chucNang']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $vaitroCreate = $this->qlsv_vaitro->create([
                'ma' => $request->ma,
                'ten' => $request->ten
            ]);

            $chucNang = $request->chucnang;
            foreach($chucNang as $chucNangId){
                DB::table('qlsv_vaitrovachucnangs')->insert([
                    'id_vaitro' => $vaitroCreate->id,
                    'id_chucnang' => $chucNangId
                ]);
            }   
            DB::commit();
            return redirect()->route('qlsv_vaitro.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Loi:'.$exception->getMessage() . $exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_vaitro  $qlsv_vaitro
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_vaitro $qlsv_vaitro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_vaitro  $qlsv_vaitro
     * @return \Illuminate\Http\Response
     */
    public function edit(qlsv_vaitro $qlsv_vaitro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_vaitro  $qlsv_vaitro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_vaitro $qlsv_vaitro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_vaitro  $qlsv_vaitro
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_vaitro $qlsv_vaitro)
    {
        //
    }
}
