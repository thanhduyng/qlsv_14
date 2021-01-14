<?php

namespace App\Http\Controllers;

use App\qlsv_giangvien;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QlsvGiangvienController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$title = "Danh sách giảng viên";
		$search = $request->get('search') ?? "";
		$giangVien = DB::table('qlsv_giangviens')->where('hovaten', 'like', '%' . $search . '%')->where("deleted_at", 0)->paginate(10);
		return view('admin.GiangVien.dsgiangvien', compact(['giangVien', 'title', 'search']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = "Thêm giảng viên";
		return view('admin.GiangVien.themgiangvien', compact(['title']));
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
		$giangVien = new qlsv_giangvien();
		$User = new User();
		$User->name = $request->name;
		$User->email = $request->email;

		$request->validate(
			[
				'name' => 'required|string|max:100',
				'email' => 'required|unique:users|email|ends_with:@gmail.com',

			]
		);
		$User->password = Hash::make($request->password);
		$User->save();

		$giangVien->hovaten = $request->hovaten;
		$giangVien->ngaysinh = $request->ngaysinh;
		$giangVien->diachi = $request->diachi;
		$giangVien->gioitinh = $request->gioitinh;
		$giangVien->sodienthoaicanhan = $request->sodienthoaicanhan;
		$giangVien->sodienthoaicongkhai = $request->sodienthoaicongkhai;
		$giangVien->gioithieu = $request->gioithieu;
		$giangVien->ghichu = $request->ghichu;
		$giangVien->id_user = $User->id;
		$giangVien->deleted_at = "0";
		$giangVien->created_at = Carbon::now();
		$giangVien->save();
		// return response()->json([
		// 	'success' => 'Ban Da them thanh cong!.',
		// ]);
		return redirect('/giangvien/index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\qlsv_giangvien  $qlsv_giangvien
	 * @return \Illuminate\Http\Response
	 */
	public function show(qlsv_giangvien $qlsv_giangvien)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\qlsv_giangvien  $qlsv_giangvien
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$title = "Sửa giảng viên";
		$giangVien = qlsv_giangvien::find($id);
		return view('admin.GiangVien.suagiangvien', compact(['giangVien', 'title']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\qlsv_giangvien  $qlsv_giangvien
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$giangVien = qlsv_giangvien::find($id);
		$giangVienEdit = $request->all();
		$giangVien->update(["updated_at" => Carbon::now()]);
		$giangVien->update($giangVienEdit);
		return redirect('/giangvien/index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\qlsv_giangvien  $qlsv_giangvien
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$giangVien = DB::table('qlsv_giangviens')->where('id', $id)->update(["deleted_at" => "1", "updated_at" => Carbon::now()]);
		return response()->json(['_typeMessage' => 'deleteSuccess']);;
	}
}