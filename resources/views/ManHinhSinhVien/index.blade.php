@extends('ManHinhGiangVien.layout')

@section('content')

<head>
    <style>
        .glyphicon {
            font-size: 40px;
            margin-top: -200px;
        }
    </style>
</head>
<!--  content  -->
<main style="padding-top: 0px; margin-top: 70px;">
    <!-- @yield('content') -->
    <div class="container-fluid py-5">
        <div class="row" style=" padding: 15px;">
            <h2 style="margin-left: 10px; font-weight: bold;"></h2>
            <div class="col-md-10 mx-auto">
                <form>
                    <div class="form-group row" style="margin-top: 16px;cursor: pointer;">
                        <div class="col-xs-12" style="background-color: darkgrey; height: 100px; ">
                            <span class="glyphicon glyphicon-home" style="color: #d90000;margin-top: 30px;"></span>
                            <a href="{{ route('sinh_vien.trangchu') }}" style="margin-left: 50px; font-size: 25px;">Lớp Học</a>
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top: 20px;cursor: pointer;">
                        <div class="col-xs-12" style="background-color: darkgrey; height: 100px;">
                            <i class="fa fa-commenting" style="font-size: 44px; margin-top: 34px; color: #D90000;" aria-hidden="true"></i>
                            <a href="/sinh_vien/chonlop" style="margin-left: 50px; font-size: 25px;">Xin nghỉ</a>
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top: 20px;cursor: pointer;">
                        <div class="col-xs-12" style="background-color: darkgrey; height: 100px;">
                            <i class="fa fa-bell" style="font-size: 40px; margin-top: 30px; color: #D90000;" aria-hidden="true"></i>
                            <a style="margin-left: 50px; font-size: 25px;">Thông báo</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- end content -->
@endsection