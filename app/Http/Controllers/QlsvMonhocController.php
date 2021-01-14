<?php

namespace App\Http\Controllers;

use App\qlsv_monhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Validator;
use Carbon\Carbon;
class QlsvMonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $monhoc = DB::table("qlsv_monhocs")->where('deleted_at', 0)->paginate(2);
        $monhoc1 = DB::table("qlsv_monhocs")->where('deleted_at', 0)->get();
        $title = "Danh Sách Môn Học";
        return view("admin/MonHoc/dsmonhoc", ['monhoc' => $monhoc,'monhoc1' => $monhoc1, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Đăng ký môn học";

        return view('admin/MonHoc/themmonhoc', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$validatedData = $request->validate([
        'tenmonhoc' => 'required',
        'ghichu' => 'required',
        
    ]);
        $monhoc = new qlsv_monhoc();

        $monhoc->tenmonhoc = $request->request->get("tenmonhoc");
        $monhoc->ghichu = $request->request->get("ghichu");
        $monhoc->nguoitao = "haubeo";
        $monhoc->nguoisua = "haubeo";
        $monhoc->deleted_at = 0;
		$monhoc->created_at=Carbon::now();
        $monhoc->save();

        return redirect('/monhoc/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_monhoc  $qlsv_monhoc
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_monhoc $qlsv_monhoc, Request $request)
    {
		$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);


        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
    }
	
    



    public function search(qlsv_monhoc $qlsv_monhoc, Request $request)
    {
        $term = $request->request->get("tenmonhoc");
        $monhoc = DB::table('qlsv_monhocs')->where('tenmonhoc', 'LIKE', '%' . $term . '%')
            ->paginate(2);
        $title = "Danh Sách Môn Học Tìm Được";
        $monhoc->withPath('/find?tenmonhoc=' . $term);
        return view("admin/MonHoc/dsmonhoc", ['monhoc' => $monhoc, 'title' => $title]);
		
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_monhoc  $qlsv_monhoc
     * @return \Illuminate\Http\Response
     */
    public function edit(qlsv_monhoc $qlsv_monhoc, $id)
    {
        $title = "Sửa Môn Học";
        $monhoc = qlsv_monhoc::find($id);
        return view("admin/MonHoc/suamonhoc", ['monhoc' => $monhoc, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_monhoc  $qlsv_monhoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_monhoc $qlsv_monhoc, $id)
    {
           date_default_timezone_set("Asia/Ho_Chi_Minh");
        //date_default_timezone_set("Asia/Ho_Chi_Minh");
        $monhoc = qlsv_monhoc::find($id);

        $monhoc->tenmonhoc = $request->request->get("tenmonhoc");
        $monhoc->ghichu = $request->request->get("ghichu");
		$monhoc->updated_at=Carbon::now();
        $monhoc->save();

        return redirect('/monhoc/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_monhoc  $qlsv_monhoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_monhoc $qlsv_monhoc, $id)
    {
        $monhoc = qlsv_monhoc::find($id);

        $monhoc->deleted_at = 1;
        $monhoc->save();

        return redirect('/monhoc/index');
    }
}
