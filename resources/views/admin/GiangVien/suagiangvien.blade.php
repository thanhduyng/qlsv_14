@extends('layouts.trangchu')

@section('content')
<div class="container">
    <form method="post" action="{{ route('qlsv_giangvien.update',[$giangVien->id])}} ">
        @csrf
        <div iv class="form-group">

            <input type="hidden" class="form-control" value="{{$giangVien->id}}" name="id">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Họ và Tên:</label>
            <input type="text" class="form-control" name="hovaten" value="{{$giangVien->hovaten}}"
                placeholder="nhập họ và tên">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ngày sinh:</label>
            <input type="date" class="form-control" name="ngáyinh" value="{{$giangVien->ngaysinh}}"
                placeholder="nhập họ và tên">
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="diachi" value="{{$giangVien->diachi}}"
                placeholder="nhập địa chỉ">
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Giới tính:</label>
            <!-- <label class="radio-inline"><input type="radio" value="0" {{$giangVien->gioitinh == 0 ? 'checked' : ''}}
                    name="gioitinh">Nam</label>
            <label class="radio-inline"><input type="radio" value="1" {{$giangVien->gioitinh == 1 ? 'checked' : ''}}
                    name="gioitinh">Nữ</label>
            <label class="radio-inline"><input type="radio" value="2" {{$giangVien->gioitinh == 2 ? 'checked' : ''}}
                    name="gioitinh">Khác</label> -->
            <select name="gioitinh" class="form-control">
                <option value="0" {{$giangVien->gioitinh == 0 ? 'selected' : '' }} name="gioitinh"> Nam
                </option>
                <option value="1" {{$giangVien->gioitinh == 1 ? 'selected' : ''}} name="gioitinh">Nữ</option>
                <option value="2" {{$giangVien->gioitinh == 2 ? 'selected' : ''}} name="gioitinh">Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Số điện thoại cá nhân:</label>
            <input type="text" class="form-control" value="{{$giangVien->sodienthoaicanhan}}" name="sodienthoaicanhan"
                placeholder="nhập số điện thoại liên hệ">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Số điện thoại công khai:</label>
            <input type="text" class="form-control" value="{{$giangVien->sodienthoaicongkhai}}"
                name="sodienthoaicongkhai" placeholder="nhập số điện thoại liên hệ">
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Giới thiệu:</label>
            <input type="text" class="form-control" value="{{$giangVien->gioithieu}}" name="gioithieu"
                placeholder="nhập giới thiệu">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ghi chú:</label>
            <input type="text" class="form-control" value="{{$giangVien->ghichu}}" name="ghichu"
                placeholder="nhập ghi chú">
        </div>
        <!-- <input class="btn btn-primary" type="submit" value="Sửa" /> -->
        <button type="submit" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-floppy-disk"></i> Lưu</button>

    </form>
</div>
</body>
@endsection