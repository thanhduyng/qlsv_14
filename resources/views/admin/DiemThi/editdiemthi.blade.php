@extends('layouts.trangchu')

@section('content')
<div class="container"><br><br>
    <form method="post" action="{{ route('qlsv_diemthi.update',[$qlsv_diemthi->id])}} ">
        @csrf

        <div class="form-group">
            <label>Id:{{$qlsv_diemthi->id}}</label>
            <input class="form-control" type="hidden" name="id" value="{{$qlsv_diemthi->id}}" /><br>
        </div>

        <div class="form-group">
            <label for="inputFirstname">Điểm lý thuyết:</label>
            <input type="text" value="{{$qlsv_diemthi->diemlythuyet}}" class="form-control" name="diemlythuyet"
                id="inputFirstname" placeholder="nhập điểm lý thuyết" />
        </div>
        <div class="form-group">
            <label for="inputFirstname">Điểm thực hành:</label>
            <input type="text" value="{{$qlsv_diemthi->diemthuchanh}}" class="form-control" name="diemthuchanh"
                placeholder="nhập điểm thưc hành" id="inputFirstname" />
        </div>
        <div class="form-group">
            <label for="recipient-name">Ngày chờ điểm:</label>
            <input type="date" value="{{$qlsv_diemthi->ngaychodiem}}" class="form-control" name="ngaychodiem"
                placeholder="nhập ngày chờ điểm">
        </div>

        <div class="form-group">
            <label for="">KIỂU THI:</label>
            <select name="id_kieuthi">
                <label for="id_kieuthi">ID_KIEUTHI:</label>

                @foreach($qlsv_kieuthi as $key=>$value)
                <option value="{{$key}}" {{($key == $qlsv_diemthi->id_kieuthi) ? 'selected':""}}>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>TÊN LỚP HỌC:</label>
            <select name="id_lophoc">
                @foreach($qlsv_lophoc as $key =>$value)
                <option value="{{$key}}" {{($key == 4) ? 'selected' : ""}}>{{$value}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên sinh viên:</label>
            <select name="id_sinhvien">
                @foreach($qlsv_sinhvien as $key =>$value)
                <option value="{{$key}}" {{($key == $qlsv_diemthi->id_sinhvienlophoc) ? 'selected' : ""}}>{{$value}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="recipient-name">Ghi chú:</label>
            <input type="text" value="{{$qlsv_diemthi->ghichu}}" class="form-control" name="ghichu"
                placeholder="nhập ghi chú">
        </div>

        <input class="btn btn-primary" type="submit" value="Edit" />
    </form>
</div>
</body>
@endsection