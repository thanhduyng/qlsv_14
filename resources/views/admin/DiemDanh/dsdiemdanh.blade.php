@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_diemdanh.create") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<div id="searcharea" style="display:none">
    {{--<!-- <form action="<?= route("qlsv_diemdanh.index") ?>" method="get" class="form-inline pull-">
    <div class="form-group">
            <input  style="width: 60%; margin-left: 80px;" id="" class="form-control" type="text" value="{{$search}}" name="search" placeholder="Tìm kiếm">
            <button style="margin-left: 160px; margin-top: 5px;" type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form> -->--}}
</div>
<form method=get action="<?= route("qlsv_diemdanh.index") ?>">
    <table>
    <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($diemDanh->count())
            @foreach($diemDanh as $i =>$cl )
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td width=100%>
                    <i>{{$cl->ngaydiemdanh}}</i><br>
                      
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
    <div class="text-center">
        <!-- {{ $diemDanh->appends(['sort' => 'id'])->links() }} -->
    </div>
</form>
@endsection