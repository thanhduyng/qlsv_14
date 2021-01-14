@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_diemthi.create") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>


<table>
    <thead class="andi">
        <tr>
            <th>STT</th>
            <th>ĐIỂM LÝ THUYẾT/ĐIỂM THỰC HÀNH</th>
            <th>Hành động</th>
        </tr>
        <?php $stt = 1 ?>
    </thead>
    <tbody>
        @foreach($qlsv_diemthi as $value)
        <tr>
            <input type="hidden" class="serdelete_val_id" value="{{$value->id}}">
            <td><?= $stt++ ?></td>
            <td style="width: 100%;"><i>{{$value->diemlythuyet}} </i><br>
                <i> {{$value->diemthuchanh}}</i>
            </td>
            <td style="padding-left:0;line-height: 33px;">
                <a class="btn-default btn-xs" href="{{route('qlsv_diemthi.edit',$value->id)}}">
                    <i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn-default btn-xs servicedeletebtn" href="{{route('qlsv_diemthi.delete',$value->id)}}">
                    <i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <div class="text-center">
        {{ $qlsv_diemthi->appends(['sort' => 'id'])->links() }}
    </div>
</table>
<script>
$(document).ready(function() {
    $('.servicedeletebtn').click(async function(e) {
        e.preventDefault();
        var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
        const isDelete = await swal(_swalConfig.deleteConfirm)
        if (!isDelete) return
        $.ajax(this.href)
            .done((resp) => {
                $(this).closest('tr').remove()
            });
    })
});
</script>
@endsection