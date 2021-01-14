@extends('layouts.trangchu')

@section('content')
<div class="container"><br>
    <form method="post" action="{{ route('qlsv_diemdanh.update',[$diemDanh->id])}} ">
        @csrf
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="{{$diemDanh->id}}" /><br>
        </div>

        <div class="form-group">
            <label>Tên lớp học :</label>
            <select name="id_lophoc" class="form-control">
                @foreach($svLopHoc as $nd => $value)
                <option value="{{$nd}}" {{($nd == $diemDanh->id_sinhvienlophoc) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tên sinh viên :</label>
            <select name="id_sinhvien" class="form-control">
                @foreach($svLopHoc as $nd => $value)
                <option value="{{$nd}}" {{($nd == $diemDanh->id_sinhvienlophoc) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>

        <!-- <div class="form-group">
            <label>Tên sinh viên :</label>
            <select name="id_sinhvien" class="form-control">
                @foreach($sinhVien as $nd => $value)
                <option value="{{$nd}}" {{($nd == $diemDanh->id_sinhvien) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div> -->
        <div class=" form-group col-md-12">
            <label>Tên sinh viên :</label>
            @foreach($sinhVien as $permission)
            <div class="form-check">
                <div>
                    <input {{$sinhVienLopHocs->contains($permission->hovaten)?'checked':''}} type="checkbox" class="form-check-input" name=permission[] value="{{$permission->hovaten}}" />
                    <label class="form-check-label">{{$permission->hovaten}}</label>
                </div>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="">Ngày điểm danh</label>
            <input type="text" class="form-control" name="ngaydiemdanh" value="{{$diemDanh->ngaydiemdanh}}">
        </div>

        <div class="form-group">
            <label>Đến lớp:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->denlop == 1 ? 'checked' : ''}} name="denlop">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->denlop == 2 ? 'checked' : ''}} name="denlop">Không</label>
        </div>
        <div class="form-group">
            <label>Thực hành:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->thuchanh == 1 ? 'checked' : ''}} name="thuchanh">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->thuchanh == 2 ? 'checked' : ''}} name="thuchanh">Không</label>
        </div>
        <div class="form-group">
            <label>Kiến thức:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->kienthuc == 1 ? 'checked' : ''}} name="kienthuc">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->kienthuc == 2 ? 'checked' : ''}} name="kienthuc">Không</label>
        </div>
        <div class="form-group">
            <label>Ghi chú </label></br>
            <input type="text" class="form-control" name="ghichu" value="{{$diemDanh->ghichu}}">
        </div>
        <input class="btn btn-primary" type="submit" value="Sửa" />
    </form>
</div>
</body>
@endsection