@extends('layouts.trangchu')

@section('content')

<main style="padding-top: 0px; margin-top: 70px; margin-bottom: 200px;">
    <!-- @yield('content') -->
    <h1></h1><br>
    <form action="{{route('qlsv_diemthi.store')}}" method="post">
        @csrf
        <div class="form-group row">
            <label style="margin-left: 20px;" class="col-sm-2 col-xs-2">Lớp :</label>
            <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;">
                <p>{{$qlsv_lophoc->tenlophoc}}
                    <input type="hidden" name="idlop" value="{{$qlsv_lophoc->id}}">
                </p>
            </div>
        </div>


        <table style="width: 100%; ">
            <?php $stt = 1 ?>
            <thead>
                <tr>
                    <th style="height: 13px;">STT</th>
                    <th style="height: 13px;">Tên sinh viên</th>
                    <th style="height: 13px;">Lý thyết</th>
                    <th style="height: 13px;">Thực hành</th>

                </tr>
            </thead>
            <tbody>
                @foreach($qlsv_sinhvienlophoc as $values)
                <tr>

                    <td>
                        <?= $stt++ ?>
                        <input type="hidden" name="id_sinhvienlophoc[]" value="{{$values->id_sinhvien}}">
                    </td>
                    <td>{{$values->hovaten}}</td>
                    <td>
                        <input type="number" style="width:50px;" name="diemlythuyet[]"
                            value="{{$values->diemlythuyet}}">
                    </td>
                    <td>
                        <input type="number" style="width:50px;" name="diemthuchanh[]"
                            value="{{$values->diemthuchanh}}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success px-4 float-right" style="margin-top: 10px;margin-right:100px"> <i
                class="glyphicon glyphicon-plus"></i>Lưu</button>
    </form>


</main>


@endsection