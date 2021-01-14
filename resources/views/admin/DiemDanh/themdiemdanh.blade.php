@extends('layouts.trangchu')

@section('content')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
</head>
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_diemdanh.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
    <div class="row" style="background-color:#ddd; padding: 20px; padding-bottom: 50px;">
        <div class="col-md-10 mx-auto">
            <form method="post" action="{{route('qlsv_diemdanh.store')}}">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Ngày điểm danh</label>
                        <input type="date" class="form-control" name="ngaydiemdanh" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label>Lớp học:</label>
                        <select name="lophocs" class="form-control">
                            @foreach($lopHoc as $nd => $value)
                            <option value="{{$nd}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Đến lớp</label>
                        <select name="denlop" class="form-control">
                            <option value="1">Có</option>
                            <option value="2">Không</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Kiến thức</label>
                        <select name="kienthuc" class="form-control">
                            <option value="1">Y</option>
                            <option value="2">N</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Thực hành</label>
                        <select name="thuchanh" class="form-control">
                            <option value="1">Y</option>
                            <option value="2">N</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <label for="">Ghi chú</label>
                        <input type="text" class="form-control" name="ghichu" value="" placeholder="Nhập ghi chú">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-6 col-xs-6">
                        <label>Sinh viên</label><br>
                        <select id="sinhvien" name="sinhviens[]" multiple class="form-control">
                            @foreach($sinhVien as $nd => $value)
                            <option value="{{$nd}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#sinhvien').multiselect({
            nonSelectedText: 'Chọn',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '340px'
        });
    });
</script>
@endsection