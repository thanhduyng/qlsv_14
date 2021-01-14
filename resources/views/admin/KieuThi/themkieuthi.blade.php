@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_kieuthi.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
    <div class="row" style="background-color:#ddd; padding: 20px; padding-bottom: 50px;">
        <div class="col-md-10 mx-auto">
            <form method="post" action="{{route('qlsv_kieuthi.store')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="kieuthi">Tên Kiểu Thi:</label>
                        <input type="text" class="form-control" name="kieuthi" placeholder="nhập tên Kiểu Thi" />
                    </div>

                </div>
                <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
             
            </form>
        </div>
    </div>
</div>
@endsection