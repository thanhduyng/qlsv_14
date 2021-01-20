<!DOCTYPE html>
<html>

<head>
    <title>trang chu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable = no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/footer.css" />
    <link rel="stylesheet" href="/css/mobile.css" />
    <link rel="stylesheet" href="/css/dsresponsive.css" />
    <style>
        a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <span style="font-size: 17px; font-weight: bold;" class="plus-index">{{$title}}</span>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars" style="margin-right: 14px; font-size: 23px;"></i>
            </a>
        </div>
    </div>
    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none; top: 0;" id="mySidebar">
        <!-- <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16" style="margin-left: 140px;">
            ×</a> -->
        <a><img src="/images/logo1.png" class="logotruong" style="width: 100%; background-color: #fff; margin-top: 0;margin-left: 0px;padding: 7px;margin-bottom: 15px;"></a>
        <a href="" onclick="w3_close()" class="w3-bar-item w3-button">Quản lý sinh viên</a>
        <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">Quản lý giảng viên</a>
        <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">Quảng lý khoá học</a>
        <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">Quản lý điểm</a>
        <div class="dropdown">
            <a class="w3-bar-item w3-button" data-toggle="dropdown">Quản trị hệ thống<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="active" href="#"><a>Text</a></li>
                <li class="active" href="#"><a>Text</a></li>
                <li class="active" href="#"><a>Text</a></li>
            </ul>
        </div>
        
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">Quản lý môn học</a>

    </nav>

    <!--  content  -->
    <main style="padding-top: 0px; margin-top: 70px;">
        @yield('content')
    </main>
    <!-- end content -->



    <script>
        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>


</body>
<!-- footer -->
<footer class="footer-distributed">
    <div class="form-group row">
        <div class="col-xs-7">
            <p><span style="color: #fff; font-size: 14px;">Liên kết :</span></p>
            <a style=" color: #fff; font-size: 14px;" href="http://ispacedanang.edu.vn/">ispacedanang.edu.vn</a>
            <a style=" color: #fff; font-size: 14px;" href="https://aspace.edu.vn/">aspace.edu.vn</a>
        </div>
        <div class="col-xs-5">
            <p style="color: #fff; font-size: 14px;">Liên hệ :</p><a style="font-size: 14px;">0774 955 635</a>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>