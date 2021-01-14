@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
  <a style="margin-right: 15px; margin-top: 5px;" class="btn btn-primary btn-sm" href="<?= route("qlsv_khoahoc.index") ?>">
    <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
  <div class="row" style="padding: 20px;">
    <form method="post" action="{{ route('qlsv_khoahoc.update',[$khoaHoc->id])}} ">
      @csrf
      <div class="form-group">
        <!-- <label>Id:{{$khoaHoc->id}}</label> -->
        <input class="form-control" type="hidden" name="id" value="{{$khoaHoc->id}}" />
      </div>
      <div class="form-group">
        <label>Tên khoá học :</label>
        <input class="form-control" type="text" name="tenkhoahoc" value="{{$khoaHoc->tenkhoahoc}}" />
      </div>
      <div class="form-group">
        <label>Ghi chú:</label>
        <input class="form-control" type="text" name="ghichu" value="{{$khoaHoc->ghichu}}" />
      </div>
      <button type="submit" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-floppy-disk"></i> Lưu</button>
    </form>
  </div>
</div>
</body>
@endsection