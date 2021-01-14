@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_giangvien.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>

<head>

    <style>
    @media (max-width: 880px) {
        .plus-them {
            margin-left: 300px;
        }
    }
    </style>
</head>

<body>
    <div class="container-fuild py-5" style="margin-top: 0px; margin-bottom: 1px;">
        <div class="row" style="background-color:#ddd; padding: 40px; padding-bottom: 80px;">
            <div class="col-md-10 mx-auto">
                <form method="post" action="{{route('qlsv_tudanhgia.store')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Tên Môn học:</label>
                            <select name="id_monhoc" class="form-control">
                                @foreach($qlsv_monhoc as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Tiêu đề:</label>
                            <input type="text" class="form-control" name="tieude" placeholder="nhập tên Tiêu đề" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Câu hỏi:</label>
                            <input type="text" class="form-control" name="cauhoi" placeholder="nhập tên Câu hỏi" />
                        </div>
                        <div class="col-sm-6">
                            <label>Thứ tự: </label></br>
                            <input type="text" class="form-control" name="thutu" placeholder="nhập tên Thứ tự" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Số lượng câu trả lời:</label>
                            <input type="number" class="form-control" name="soluongcautraloi"
                                placeholder="nhập Số lượng câu trả lời" />

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right"><i
                            class="glyphicon glyphicon-plus"></i> Thêm mới</button>

                </form>
            </div>
        </div>
    </div>

    @endsection