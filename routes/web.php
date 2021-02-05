<?php

use App\Http\Controllers\QlsvKhoahocController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\REQUEST;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
})->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//-------------------- Khoá học ------------------------
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'khoahoc'], function () {
        Route::get('/index', [
            'as' => 'qlsv_khoahoc.index', 'uses' => 'QlsvKhoahocController@index',
            'middleware' => 'checkquyen:list-khoahoc'
        ]);
        Route::get('/create', [
            'as' => 'qlsv_khoahoc.create', 'uses' => 'QlsvKhoahocController@create',
            'middleware' => 'checkquyen:add-khoahoc'
        ]);
        Route::post('/store', 'QlsvKhoahocController@store')->name('qlsv_khoahoc.store');
        Route::get('/edit/{id}', [
            'as' => 'qlsv_khoahoc.edit', 'uses' => 'QlsvKhoahocController@edit',
            'middleware' => 'checkquyen:edit-khoahoc'
        ]);
        Route::post('/update/{id}', 'QlsvKhoahocController@update')->name('qlsv_khoahoc.update');
        Route::get('/delete/{id}', 'QlsvKhoahocController@destroy');
        Route::get('/delete_id/{id}', 'QlsvKhoahocController@destroy');
        Route::delete('deleteCheckbox', 'QlsvKhoahocController@deleteAll');
        Route::get('/search', 'QlsvKhoahocController@search');
    });
});

//-------------------- Lớp học  ------------------------
Route::group(['prefix' => 'lophoc'], function () {
    Route::get("/index", 'QlsvLophocController@index')->name("qlsvlophoc.index");
    Route::get('/create', 'QlsvLophocController@create')->name('qlsvlophoc.create');
    Route::post('/store', 'QlsvLophocController@store')->name('qlsvlophoc.store');
    Route::get('/edit/{id}', 'QlsvLophocController@edit')->name('qlsvlophoc.edit');
    Route::post('/update/{id}', 'QlsvLophocController@update')->name('qlsvlophoc.update');
    Route::get('/delete/{id}', 'QlsvLophocController@destroy');
    Route::get('/search', 'QlsvLophocController@search')->name('qlsvlophoc.search');
});

//-------------------- Giảng viên ------------------------
Route::group(['prefix' => 'giangvien'], function () {
    Route::get("/index", 'QlsvGiangvienController@index')->name("qlsv_giangvien.index");
    Route::get('/create', 'QlsvGiangvienController@create')->name('qlsv_giangvien.create');
    Route::post('/store', 'QlsvGiangvienController@store')->name('qlsv_giangvien.store');
    Route::get('/edit/{id}', 'QlsvGiangvienController@edit')->name('qlsv_giangvien.edit');
    Route::post('/update/{id}', 'QlsvGiangvienController@update')->name('qlsv_giangvien.update');
    Route::post('/delete/{id}', 'QlsvGiangvienController@destroy');
});


//-------------------- Quản Trị ------------------------
Route::group(['prefix' => 'quantri'], function () {
    Route::get("/index", 'QlsvNguoidungquantriController@index')->name("qlsv_quantri.index");
    Route::get('/create', 'QlsvNguoidungquantriController@create')->name('qlsv_quantri.create');
    Route::post('/store', 'QlsvNguoidungquantriController@store')->name('qlsv_quantri.store');
    Route::get('/edit/{id}', 'QlsvNguoidungquantriController@edit')->name('qlsv_quantri.edit');
    Route::post('/update/{id}', 'QlsvNguoidungquantriController@update')->name('qlsv_quantri.update');
    Route::get('/delete/{id}', 'QlsvNguoidungquantriController@destroy');
});


//-------------------- Thời khoá biểu  ------------------------
Route::group(['prefix' => 'thoikhoabieu'], function () {
    Route::get("/index", 'QlsvThoikhoabieuController@index')->name("qlsv_thoikhoabieu.index");
    Route::get('/create', 'QlsvThoikhoabieuController@create')->name('qlsv_thoikhoabieu.create');
    Route::post('/storegiaovu', 'QlsvThoikhoabieuController@storegiaovu')->name('qlsv_thoikhoabieu.storegiaovu');
    Route::get('/creategiaovu', 'QlsvThoikhoabieuController@creategiaovu')->name('qlsv_thoikhoabieu.creategiaovu');
    Route::post('/store', 'QlsvThoikhoabieuController@store')->name('qlsv_thoikhoabieu.store');
    Route::get('/edit/{id}', 'QlsvThoikhoabieuController@edit')->name('qlsv_thoikhoabieu.edit');
    Route::post('/update/{id}', 'QlsvThoikhoabieuController@update')->name('qlsv_thoikhoabieu.update');
    Route::get('/delete/{id}', 'QlsvThoikhoabieuController@destroy');
});


//-------------------- Phòng học  ------------------------
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'phonghoc'], function () {
        Route::get("/index", 'QlsvPhonghocController@index')->name("qlsv_phonghoc.index");
        Route::get('/create', 'QlsvPhonghocController@create')->name('qlsv_phonghoc.create');
        Route::post('/store', 'QlsvPhonghocController@store')->name('qlsv_phonghoc.store');
        Route::get('/edit/{id}', 'QlsvPhonghocController@edit')->name('qlsv_phonghoc.edit');
        Route::post('/update/{id}', 'QlsvPhonghocController@update')->name('qlsv_phonghoc.update');
        Route::get('/delete/{id}', [
            'as' => 'qlsv_khoahoc.edit', 'uses' => 'QlsvPhonghocController@destroy',
            'middleware' => 'checkquyen:delete-phonghoc'
        ]);
    });
});

Route::get('/diemdanhs', 'QlsvDiemdanhController@showForm');
Route::post('/showCitiesInCountry', 'QlsvSinhvienController@showCitiesInCountry');

Route::get('/form', 'QlsvLophocController@showForm');


//-------------------- Sinh Viên  ------------------------
Route::group(['prefix' => 'sinhvien'], function () {
    Route::get('index', 'QlsvSinhVienController@index')->name('qlsv_sinhvien.index');
    Route::get('/create', 'QlsvSinhVienController@create')->name('qlsv_sinhvien.create');
    Route::post('/store', 'QlsvSinhVienController@store')->name('qlsv_sinhvien.store');
    Route::get('/edit/{id}', 'QlsvSinhVienController@edit')->name('qlsv_sinhvien.edit');
    Route::post('/update/{id}', 'QlsvSinhVienController@update')->name('qlsv_sinhvien.update');
    Route::get('/delete/{id}', 'QlsvSinhVienController@destroy');
});

//-------------------- Kiểu thi  ------------------------
Route::group(['prefix' => 'kieuthi'], function () {
    Route::get('/index', 'QlsvKieuthiController@index')->name('qlsv_kieuthi.index');
    Route::get('/create', 'QlsvKieuthiController@create')->name('qlsv_kieuthi.create');
    Route::post('/store', 'QlsvKieuthiController@store')->name('qlsv_kieuthi.store');
    Route::get('/edit/{id}', 'QlsvKieuthiController@edit')->name('qlsv_kieuthi.edit');
    Route::post('/update/{id}', 'QlsvKieuthiController@update')->name('qlsv_kieuthi.update');
    Route::get('/delete/{id}', 'QlsvKieuthiController@destroy');
});

//-------------------- Môn học  ------------------------
Route::group(['prefix' => 'monhoc'], function () {
    Route::get('index', 'QlsvMonhocController@index')->name('qlsv_monhoc.index');
    Route::get('/create', 'QlsvMonhocController@create')->name('qlsv_monhoc.create');
    Route::post('/add', 'QlsvMonhocController@store')->name('qlsv_monhoc.store');
    Route::get('/edit/{id}', 'QlsvMonhocController@edit')->name('qlsv_monhoc.edit');
    Route::post('/update/{id}', 'QlsvMonhocController@update')->name('qlsv_monhoc.update');
    Route::get('/delete/{id}', 'QlsvMonhocController@destroy')->name('qlsv_monhoc.destroy');
    Route::get('/find', 'QlsvMonhocController@search')->name('qlsv_monhoc.search');
});

//----------------Tự đánh giá sinh viên------------------
Route::group(['prefix' => 'tudanhgia'], function () {
    Route::get('/index', 'QlsvTudanhgiaController@index')->name('qlsv_tudanhgia.index');
    Route::get('/create', 'QlsvTudanhgiaController@create')->name('qlsv_tudanhgia.create');
    Route::post('/store', 'QlsvTudanhgiaController@store')->name('qlsv_tudanhgia.store');
    Route::get('/edit/{id}', 'QlsvTudanhgiaController@edit')->name('qlsv_tudanhgia.edit');
    Route::post('/update', 'QlsvTudanhgiaController@update')->name('qlsv_tudanhgia.update');
    Route::post('/delete/{id}', 'QlsvTudanhgiaController@destroy')->name('qlsv_tudanhgia.delete');
    Route::get('/find', 'QlsvTudanhgiaController@search')->name('qlsv_tudanhgia.search');
});

//-------------------- Màn hình giảng viên  ------------------------
Route::group(['prefix' => 'giang_vien'], function () {
    Route::get("/trangchu", 'GiangVien\ManhinhGiangvienController@trangchu')->name("giang_vien.trangchu");
    Route::get("/viewdiemdanh", 'GiangVien\ManhinhGiangvienController@viewdiemdanh')->name("giang_vien.viewdiemdanh");
    Route::post("/storediemdanh", 'GiangVien\ManhinhGiangvienController@storediemdanh')->name("giang_vien.storediemdanh");
    Route::get("/viewnhatky", 'GiangVien\ManhinhGiangvienController@viewnhatky')->name("giang_vien.viewnhatky");
    Route::post("/storenhatky", 'GiangVien\ManhinhGiangvienController@storenhatky')->name("giang_vien.storenhatky");
    Route::get("/viewdiemthi", 'GiangVien\ManhinhGiangvienController@viewdiemthi')->name("giang_vien.viewdiemthi");
    Route::post("/storediemthi", 'GiangVien\ManhinhGiangvienController@storediemthi')->name("giang_vien.storediemthi");
});

//-------------------- Màn hình sinh viên  ------------------------
Route::group(['prefix' => 'sinh_vien'], function () {
    Route::get("/trangchu", 'SinhVien\ManhinhSinhvienController@trangchu')->name("sinh_vien.trangchu");
    Route::get("/viewdiemthi", 'SinhVien\ManhinhSinhvienController@viewdiemthi')->name("sinh_vien.viewdiemthi");
    Route::post("/storediemthi", 'SinhVien\ManhinhSinhvienController@storediemthi')->name("sinh_vien.storediemthi");
    Route::get("/viewdiemdanh", 'SinhVien\ManhinhSinhvienController@viewdiemdanh')->name("sinh_vien.viewdiemdanh");
});

//-------------------- Màn hình người dùng quản trị  ------------------------
Route::group(['prefix' => 'quan_tri'], function () {
    Route::get("/trangchu", 'QuanTri\ManhinhQuantriController@trangchu')->name("quan_tri.trangchu");
});

//-------------------- Chức năng  ------------------------
Route::group(['prefix' => 'chucnang'], function () {
    Route::get("/index", 'QlsvChucnangController@index')->name("qlsv_chucnang.index");
    Route::get('/create', 'QlsvChucnangController@create')->name('qlsv_chucnang.create');
    Route::post('/store', 'QlsvChucnangController@store')->name('qlsv_chucnang.store');
    Route::get('/edit/{id}', 'QlsvChucnangController@edit')->name('qlsv_chucnang.edit');
    Route::post('/update/{id}', 'QlsvChucnangController@update')->name('qlsv_chucnang.update');
    Route::get('/delete/{id}', 'QlsvChucnangController@destroy');
});
//-------------------- Nhóm  ------------------------
Route::group(['prefix' => 'nhom'], function () {
    Route::get("/index", 'QlsvNhomController@index')->name("qlsv_nhom.index");
    Route::get('/create', 'QlsvNhomController@create')->name('qlsv_nhom.create');
    Route::post('/store', 'QlsvNhomController@store')->name('qlsv_nhom.store');
    Route::get('/edit/{id}', 'QlsvNhomController@edit')->name('qlsv_nhom.edit');
    Route::post('/update/{id}', 'QlsvNhomController@update')->name('qlsv_nhom.update');
    Route::get('/delete/{id}', 'QlsvNhomController@destroy');
});

//-------------------- Vai trò  ------------------------
Route::middleware(['auth'])->group(function () {
    Route::prefix('vaitro')->group(function () {
        Route::get("/index", 'QlsvVaitroController@index')->name("qlsv_vaitro.index");
        Route::get('/create', 'QlsvVaitroController@create')->name('qlsv_vaitro.create');
        Route::post('/store', 'QlsvVaitroController@store')->name('qlsv_vaitro.store');
        Route::get('/edit/{id}', 'QlsvVaitroController@edit')->name('qlsv_vaitro.edit');
        Route::post('/edit/{id}', 'QlsvVaitroController@update')->name('qlsv_vaitro.update');
        Route::get('/delete/{id}', 'QlsvVaitroController@destroy');
    });
});

//-------------------- users  ------------------------
Route::middleware(['auth'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get("/index", 'UserController@index')->name("user.index");
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.update');
        Route::get('/delete/{id}', 'UserController@destroy');
    });
});

//-------------------- worktask  ------------------------
Route::group(['prefix' => 'worktask'], function () {
    // Route::get('index', 'QlsvWorktaskController@index')->name('qlsv_worktask.index');
    //Route::get('/chonmon', 'QlsvWorktaskController@chonmon')->name('qlsv_worktask.chonmon');
    Route::get('/mon/{id}', 'QlsvWorktaskController@mon')->name('qlsv_worktask.mon');
    Route::get('/create/{id}', 'QlsvWorktaskController@create')->name('qlsv_worktask.create');
    Route::post('/store', 'QlsvWorktaskController@store')->name('qlsv_worktask.store');
    Route::get('/edit/{id}', 'QlsvWorktaskController@edit')->name('qlsv_worktask.edit');
    Route::post('/update/{id}', 'QlsvWorktaskController@update')->name('qlsv_worktask.update');
    Route::get('/delete/{id}', 'QlsvWorktaskController@destroy')->name('qlsv_worktask.destroy');
    //Route::get('/find', 'QlsvWorktaskController@search')->name('qlsv_worktask.search');
    Route::get('/worktaskfind', 'QlsvWorktaskController@worktaskfind')->name('qlsv_worktask.worktaskfind');
    // Route::get('/findmon1', 'QlsvWorktaskController@searchmon1')->name('qlsv_worktask.searchmon1');
    //Route::get('/findmon', 'QlsvWorktaskController@searchmon')->name('qlsv_worktask.searchmon');
    //	Route::get('/chonmonhoc', 'QlsvWorktaskController@chonmonhoc')->name('qlsv_worktask.chonmonhoc');
    //Route::get('/show', 'QlsvWorktaskController@show')->name('qlsv_worktask.show');
    //	Route::get('/worktaskmon/{id}', 'QlsvWorktaskController@worktaskmon')->name('qlsv_worktask.worktaskmon');
});

//-------------------- worktaskdetail  ------------------------
Route::group(['prefix' => 'worktaskdetail'], function () {
    Route::get('index', 'QlsvWorktaskdetailController@index')->name('qlsv_worktaskdetail.index');
    Route::get('/create', 'QlsvWorktaskdetailController@create')->name('qlsv_worktaskdetail.create');
    Route::post('/store', 'QlsvWorktaskdetailController@store')->name('qlsv_worktaskdetail.store');
    Route::get('/edit/{id}', 'QlsvWorktaskdetailController@edit')->name('qlsv_worktaskdetail.edit');
    Route::post('/update/{id}', 'QlsvWorktaskdetailController@update')->name('qlsv_worktaskdetail.update');
    Route::get('/delete/{id}', 'QlsvWorktaskdetailController@destroy')->name('qlsv_worktaskdetail.destroy');
    Route::get('/find', 'QlsvWorktaskdetailController@search')->name('qlsv_worktaskdetail.search');
});

Route::get('/export_excel', 'ExportExcelController@index');
Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
