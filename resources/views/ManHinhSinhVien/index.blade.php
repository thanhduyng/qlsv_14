@extends('layouts.layout')

@section('content')
<!--  content  -->
<main>
    <!-- @yield('content') -->
    <div class="container-fluid py-5">
        <div class="row">
            <h2 style="margin-left: 10px; font-weight: bold;"></h2>
            <div style="margin-left: 15px;">
                <form>
                    <div class="form-group row lxt col-sm-4 col-xs-12" style="">
                        <div class="col-xs-12 txl lophoc">
                            <a href="{{ route('sinh_vien.trangchu') }}">Lớp Học</a>
                        </div>
                    </div>
                    <div class="form-group row lxt col-sm-4 col-xs-12" style="">
                        <div class="col-xs-12 txl xinnghi">
                            <a href="/sinh_vien/chonlop">Xin nghỉ</a>
                        </div>
                    </div>
                    <div class="form-group row lxt col-sm-4 col-xs-12">
                        <div class="col-xs-12 thongbao">
                            <a>Thông báo</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- end content -->
@endsection