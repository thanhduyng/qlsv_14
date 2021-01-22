@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding-top: 7px; padding-bottom: 5px;">

    <a class="btn btn-success btn-sm" href="<?= route("user.create") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>
</div>
<form method=get action="<?= route("user.index") ?>">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count())
            @foreach($users as $i =>$cl )
            <tr>
                <td>
                    <a class="btn btn-default btn-circle">{{$i+1}}</a>
                </td>
                <td width=100%>
                    <i style="margin-left: 25px;">{{$cl->name}}</i><br>
                    <i style="margin-left: 25px;">{{$cl->email}}</i>

                </td>
                <td>
                    <a class="btn-sm-primary" style="color: black;" href="/users/edit/{{$cl->id}}">
                        Edit</a>
                    <a class="btn-sm-danger" style="color: black;" href="/users/delete/{{$cl->id}}">
                        Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="text-center">

    </div>
</form>
@endsection