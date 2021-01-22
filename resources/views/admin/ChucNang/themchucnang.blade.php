@extends('layouts.trangchu')

@section('content')
<br>
<div class="container-fluid py-5">
  <div class="row" style="padding: 20px;">
    <form method="post" action="{{route('qlsv_chucnang.store')}}">
      @csrf
      <div class="form-group row">
        <div class="col-sm-6">
          <label>Mã chức năng</label>
          <input type="text" class="form-control" id="" name="ma" placeholder="nhập mã" />
        </div>
        <div class="col-sm-6" style="margin-top: 6px;">
          <label>Tên</label>
          <input type="text" class="form-control" id="" name="ten" placeholder="nhập tên"/>

        </div>
      </div>
      <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
    </form>
  </div>
</div>
@endsection