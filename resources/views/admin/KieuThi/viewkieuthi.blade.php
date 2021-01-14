@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_kieuthi.create")?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<div id="searcharea" style="display:none">
    <form action="{{route('qlsv_kieuthi.index')}}" method="get" class="form-inline pull-right">
        <div class="form-group">
            <input id="" class="form-control" type="text" value="{{$search}}" name="search" placeholder="Tìm kiếm">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
</div>

<form action="">
    <table>
    <thead class="andi">
            <tr>
                <th>STT</th>
                <th>HỌ VÀ TÊN</th>
                <th>Hành động</th>

            </tr>
            <?php $stt = 1 ?>
        </thead>
        <tbody>
            @foreach($qlsv_kieuthi as $value)
            <tr>
                <td><?= $stt++ ?></td>
                <td width=100%>
                    {{$value->kieuthi}}
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="edit/{{$value->id}}">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs" href="delete/{{$value->id}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
        <div class="text-center">
            {{ $qlsv_kieuthi->appends(['sort' => 'id'])->links() }}
        </div>
    </table>

</form>




@endsection