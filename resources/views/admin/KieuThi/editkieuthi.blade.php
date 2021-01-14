@extends('layouts.trangchu')

@section('content')
    <div class="container"><br>
        <hr>
        <form method="post" action="{{ route('qlsv_kieuthi.update',[$qlsv_kieuthi->id])}} ">
            @csrf
            <div iv class="form-group">
                <input type="hidden" class="form-control" value="{{$qlsv_kieuthi->id}}" name="id">
            </div>
            <div class="form-group">
            <label for="ten">Tên Kiểu Thi:</label>
                            <input type="text" class="form-control" name="kieuthi"   value="{{$qlsv_kieuthi->kieuthi}}" placeholder="nhập tên Kiểu Thi"/>
            </div>
            <input class="btn btn-primary" type="submit" value="Sửa" />
        </form>
    </div>
</body>
@endsection