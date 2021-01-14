@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>

    <a class="btn btn-success btn-sm" href="{{route('qlsv_tudanhgia.create')}}">
        <i class="glyphicon glyphicon-plus"></i></a>
</div>
<div id="searcharea" style="display:none">
    <form action="" method="get" class="form-inline pull-right">
        <div class="form-group">
            <input id="" class="form-control" type="text" value="" name="" placeholder="Tìm kiếm">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th width=100%>Tên Môn Học</th>
            <!-- <th>Tiêu Đề</th> -->
            <!-- <th>Câu Hỏi</th>
            <th>Thứ Tự</th>
            <th>Số Câu Hỏi Trả Lời</th> -->
            <th>Hành Động</th>

        </tr>
        <?php $stt = 1 ?>
    </thead>
    <tbody>
        @foreach($qlsv_tudanhgia as $value )
        <tr>
            <input type="hidden" class="serdelete_val_id" value="{{$value->id}}">
            <td> <?= $stt++ ?></td>
            <td width=100%>
                {{$qlsv_monhoc[$value->id_monhoc] ?? " "}}<br>
                <!-- <i>{{$value->tieude}}</i> -->
            </td>

            <td style="padding-left:0;line-height: 33px;">
                <a class="btn-default btn-xs" href="{{route('qlsv_tudanhgia.edit',$value->id)}}">
                    <i class=" glyphicon glyphicon-pencil"></i></a>
                <a class="btn-default btn-xs servicedeletebtn" href="{{route('qlsv_tudanhgia.delete',$value->id)}}">
                    <i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
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