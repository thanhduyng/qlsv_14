@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_thoikhoabieu.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
    <div class="row" style=" padding: 20px; padding-bottom: 50px;">
        <div class="col-md-10 mx-auto">
            <form method="post" action="{{route('qlsv_thoikhoabieu.storegiaovu')}}">
                @csrf
                <div class="form-group row">

                    <div class="col-sm-6 col-xs-6">
                        <label for="">Ngày học</label>
                        <!-- <input type="date" class="form-control" id="" name="ngayhoc" placeholder="nhập ngày học" /> -->
                        <input type='date' id='hasta' class="form-control" name="ngayhoc" value='<?php echo date('Y-m-d'); ?>'>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Tên lớp học</label>
                        <select name="id_lophoc" class="form-control"> 
                        <option>--Chọn--</option>          
                            @foreach($lopHoc as $nd => $value)
                            <option value="{{$nd}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Tên phòng học</label>
                        <select name="id_phonghoc" class="form-control">
                            <option value="0">--Chọn--</option>
                            @foreach($phongHoc as $nd => $value)
                            <option value="{{$nd}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Ca học</label>
                        <select name="cahoc" class="form-control">
                            <option value="0">--Chọn--</option>
                            <option value="1">Sáng</option>
                            <option value="2">Chiều</option>
                            <option value="3">Tối</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Địa điểm học</label>
                        <select name="diadiemhoc" class="form-control">
                            <option value="0">--Chọn--</option>
                            <option value="1">Trường</option>
                            <option value="2">Xưởng Ô tô</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Lời nhắn cho Giảng viên</label>
                        <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao" placeholder=""></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection