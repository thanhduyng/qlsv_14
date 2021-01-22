@extends('layouts.trangchu')

@section('content')

<div class="container">
    <form method="post" action="{{ route('user.update',[$users->id])}} ">
        @csrf
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="{{$users->id}}" />
        </div>
        <div class="form-group">
            <label>Tên </label>
            <input class="form-control" type="text" name="name" value="{{$users->name}}" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{$users->email}}" />
        </div>

        <select class="form-control" style="" name="vaitros[]" multiple="mutiple">
            @foreach($qlsv_vaitros as $qlsv_vaitro)
            <option {{$listRowOfUser->contains($qlsv_vaitro->id)?'selected':''}} value="{{$qlsv_vaitro->id}}">{{$qlsv_vaitro->ten}}</option>
            @endforeach
        </select>

        <button style="margin-bottom: 5px;" type="submit" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-floppy-disk"></i> Lưu</button>
    </form>
</div>
@endsection