@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_thoikhoabieu.creategiaovu") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<form method=get action="<?= route("qlsv_thoikhoabieu.index") ?>">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th class="width">Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($thoiKhoaBieu->count())
            @foreach($thoiKhoaBieu as $i =>$cl )
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td class="width">
                    <i style="margin-left: 25px;">{{$cl->ngayhoc}}</i><br>
                    @if($cl->id_phonghoc != null)
                    <i style="margin-left: 25px;"><?php echo \App\qlsv_phonghoc::find($cl->id_phonghoc)->tenphonghoc ?></i><br>
                    @endif
                    <i style="margin-left: 25px;"><?php echo \App\qlsv_lophoc::find($cl->id_lophoc)->tenlophoc ?></i><br>
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="edit/{{$cl->id}}">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs" href="delete/{{$cl->id}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</form>
@endsection