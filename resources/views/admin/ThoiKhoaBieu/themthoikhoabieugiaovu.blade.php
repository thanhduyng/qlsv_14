@extends('layouts.trangchu')

@section('content')

<div style="text-align:right;padding: 4px;">
    <a style="margin-right: 15px; margin-top: 5px;" class="btn btn-primary btn-sm" href="<?= route("qlsv_thoikhoabieu.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
    <div class="row" style=" padding: 17px; margin-top: 8px;">
        <form method="post" action="{{route('qlsv_thoikhoabieu.storegiaovu')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12 col-xs-12">
                    <label for="">Tên lớp học</label>
                    <select name="id_lophoc" class="form-control">
                        <option>-- Chọn --</option>
                        @foreach($lopHoc as $nd => $value)
                        <option value="{{$nd}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div style="border: 2px solid #CCCCCC; border-radius: 7px; padding: 10px;">
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label>Ngày học</label>
                        <input type='date' id='hasta' class="form-control" name="ngayhoc[]" value=''>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label>Ca học</label>
                        <select name="cahoc[]" class="form-control">
                            <option value="0">-- Chọn --</option>
                            <option value="1">Sáng</option>
                            <option value="2">Chiều</option>
                            <option value="3">Tối</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label>Địa điểm học</label>
                        <select name="diadiemhoc[]" class="form-control">
                            <option value="1">Trường</option>
                            <option value="2">Xưởng Ô tô</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label for="">Lời nhắn PĐT</label>
                        <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao[]" placeholder="nhập lời nhắn"></textarea>
                    </div>
                </div>
            </div>
            <div style="border: 2px solid #CCCCCC; border-radius: 7px; padding: 10px; margin-top: 15px;">
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label>Ngày học</label>
                        <input type='date' id='hasta' class="form-control" name="ngayhoc[]" value=''>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label>Ca học</label>
                        <select name="cahoc[]" class="form-control">
                            <option value="0">-- Chọn --</option>
                            <option value="1">Sáng</option>
                            <option value="2">Chiều</option>
                            <option value="3">Tối</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label>Địa điểm học</label>
                        <select name="diadiemhoc[]" class="form-control">
                            <option value="1">Trường</option>
                            <option value="2">Xưởng Ô tô</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label for="">Lời nhắn PĐT</label>
                        <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao[]" placeholder="nhập lời nhắn"></textarea>
                    </div>
                </div>
            </div>
            <div style="border: 2px solid #CCCCCC; border-radius: 7px; padding: 10px; margin-top: 15px;">
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label>Ngày học</label>
                        <input type='date' id='hasta' class="form-control" name="ngayhoc[]" value=''>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label>Ca học</label>
                        <select name="cahoc[]" class="form-control">
                            <option value="0">-- Chọn --</option>
                            <option value="1">Sáng</option>
                            <option value="2">Chiều</option>
                            <option value="3">Tối</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label>Địa điểm học</label>
                        <select name="diadiemhoc[]" class="form-control">
                            <option value="1">Trường</option>
                            <option value="2">Xưởng Ô tô</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                        <label for="">Lời nhắn PĐT</label>
                        <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao[]" placeholder="nhập lời nhắn"></textarea>
                    </div>
                </div>
            </div>
            <div style="text-align:right;padding-top: 7px; padding-bottom: 5px;">
                <a class="btn btn-primary btn-sm" href="#" onclick="$('#addthem').toggle();return false;">
                    <i class="glyphicon glyphicon-plus"></i></a>
            </div>

            <div id="addthem" style="display:none; margin-top: 10px;">
                <div style="border: 2px solid #CCCCCC; border-radius: 7px; padding: 10px; margin-top: 0px;">
                    <div class="form-group row">
                        <div class="col-sm-6 col-xs-6">
                            <label>Ngày học</label>
                            <input type='date' id='hasta' class="form-control" name="ngayhoc[]" value=''>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <label>Ca học</label>
                            <select name="cahoc[]" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <option value="1">Sáng</option>
                                <option value="2">Chiều</option>
                                <option value="3">Tối</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                            <label>Địa điểm học</label>
                            <select name="diadiemhoc[]" class="form-control">
                                <option value="1">Trường</option>
                                <option value="2">Xưởng Ô tô</option>
                                <option value="3">Khác</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                            <label for="">Lời nhắn PĐT</label>
                            <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao[]" placeholder="nhập lời nhắn"></textarea>
                        </div>
                    </div>
                </div>
                <div style="border: 2px solid #CCCCCC; border-radius: 7px; padding: 10px; margin-top: 15px;">
                    <div class="form-group row">
                        <div class="col-sm-6 col-xs-6">
                            <label>Ngày học</label>
                            <input type='date' id='hasta' class="form-control" name="ngayhoc[]" value=''>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <label>Ca học</label>
                            <select name="cahoc[]" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <option value="1">Sáng</option>
                                <option value="2">Chiều</option>
                                <option value="3">Tối</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                            <label>Địa điểm học</label>
                            <select name="diadiemhoc[]" class="form-control">
                                <option value="1">Trường</option>
                                <option value="2">Xưởng Ô tô</option>
                                <option value="3">Khác</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="margin-top: 5px;">
                            <label for="">Lời nhắn PĐT</label>
                            <textarea type="text" class="form-control" rows="3" name="loinhanphongdaotao[]" placeholder="nhập lời nhắn"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button style="margin-top: 9px;" type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>

</div>
@endsection