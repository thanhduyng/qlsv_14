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
                <form method="post" action="{{route('qlsv_tudanhgia.update')}}">
                    @csrf

                    <div class="form-group row">
                        <div>
                            <input type="hidden" name="id" value="{{$qlsv_tudanhgia->id}}">
                        </div>
                        <div class="col-sm-6">
                            <label>Tên Môn học:</label>
                            <select name="id_monhoc" class="form-control">
                                @foreach($qlsv_monhoc as $key => $value)
                                <option value="{{$key}}" {{($key == $qlsv_tudanhgia->id_monhoc) ? 'selected' : ""}}>
                                    {{$value}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Tiêu đề:</label>
                            <input type="text" class="form-control" value="{{$qlsv_tudanhgia->tieude}}" name="tieude"
                                placeholder="nhập tên Tiêu đề" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Câu hỏi:</label>
                            <input type="text" class="form-control" name="cauhoi" value="{{$qlsv_tudanhgia->cauhoi}}"
                                placeholder="nhập tên Câu hỏi" />
                        </div>
                        <div class="col-sm-6">
                            <label>Thứ tự: </label></br>
                            <input type="text" class="form-control" name="thutu" value="{{$qlsv_tudanhgia->thutu}}"
                                placeholder="nhập tên Thứ tự" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Số lượng câu trả lời:</label>
                            <input type="number" class="form-control" value="{{$qlsv_tudanhgia->soluongcautraloi}}"
                                name="soluongcautraloi" placeholder="nhập Số lượng câu trả lời" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right"><i
                            class="glyphicon glyphicon-plus"></i> Lưu</button>
                </form>
            </div>
        </div>
    </div>

    @endsection