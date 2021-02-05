@extends('ManHinhGiangVien.layout')

@section('content')
<form method=get action="<?= route("qlsvlophoc.index") ?>">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lopHoc as $key=> $value)
            <tr>
                <td>
                    <a class="btn btn-default btn-circle">{{$key+1}}</a>
                </td>
                <td width=100%>
                    <p style="margin-left: 23px;">Lớp: {{$value->tenlophoc}}</p>
                    <ul style="list-style: none; margin-top: 16px; margin-left: -17px; ">
                        <li style="float: left; margin-right: 3px;  "><a class="btn-sm btn-success" href="/giang_vien/viewdiemdanh/?id_lophoc={{$value->id}}&id_thoikhoabieu={{$value->id_thoikhoabieu}}">Điểm danh</a></li>
                        <li style="float: left; margin-right: 3px; "><a class="btn-sm btn-success" href="/giang_vien/viewnhatky/?id_lophoc={{$value->id}}&id_thoikhoabieu={{$value->id_thoikhoabieu}}">Nhật ký</a></li>
                        <li style="float: left;"><a class="btn-sm btn-success" href="/giang_vien/viewdiemthi/?id_lophoc={{$value->id}}&id_thoikhoabieu={{$value->id_thoikhoabieu}}">Điểm thi</a></li>
                    </ul>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">

    </div>
</form>
@endsection