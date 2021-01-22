@extends('layouts.trangchu')

@section('content')
<br>
<div class="container-fluid py-5">
    <div class="row" style="padding: 20px;">
        <form method="post" action="{{route('qlsv_vaitro.store')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6">
                    <label>mã vãi trò</label>
                    <input type="text" class="form-control" id="" name="ma" placeholder="nhập mã" />
                </div>
                <div class="col-sm-6" style="margin-top: 6px;">
                    <label>Tên vai trò</label>
                    <input type="text" class="form-control" id="" name="ten" placeholder="nhập tên" />
                </div>
            </div>

            <div style="margin-left: 228px; margin-bottom: 10px;">
                @foreach($chucNang as $chucNang)
                <div class="form-check">
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" name="chucnang[]" value="{{$chucNang->id}}">
                        <label class="form-check-label">{{$chucNang->ten}}</label>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</div>
@endsection