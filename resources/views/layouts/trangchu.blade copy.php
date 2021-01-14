<!DOCTYPE html>
<html>

<head>
    <title>trang chu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/mobile.css" />
    <style>
        /* .logo {
            height: 130px;
            background-image: url(images/aspace.jpg);
        } */

        a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>
<!-- <header class="row logo">
    <div class="col-sm-4">
        <img src="images/logo.png" class="" style="width: 47%; margin-left: 90px; margin-top: 15px;">

    </div>
    <div class="col-sm-8 shopping-mall">
        <h2 style=" margin-top: 48px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: #fff;">
            CỔNG THÔNG TIN ĐIỆN TỬ TRƯỜNG KỸ THUẬT <a style="color: #D90000; font-size: 29px;">@</a>SPACE</h2>
    </div>

</header> -->

<body>

    <!-- Navbar (sit on top) -->

    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <!-- logo start -->
            <a href="#" class="plus-index">{{$title}}</a>
            <!-- logo end -->

            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small" style="margin-right: 700px;">
                <a href="#about" class="w3-bar-item w3-button">Trang chủ</a>
                <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Giới thiệu</a>
                <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Tin tức</a>
                <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> Liên hệ</a>
                <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> Đăng nhập</a>
                <!-- <a href="#team" ><i class="glyphicon glyphicon-search"></i>Tìm kiếm</a> -->
            </div>
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
        <a><img src="images/logo.png" class="logotruong" style="  width: 100%; background-color: #fff;
            margin-top: 0;
            margin-left: 0px;
            padding: 12px;
            /* margin-right: -10px; */
            margin-bottom: 20px;"></a>
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
    <main class="py-4">
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
<footer class="footer-distributed" style="margin-top: 0px;">
    <div class="footer-left">
        <h3>Trường kỹ thuật<span> <a style="font-size: 30px; color: #222;">@</a><a style="font-size: 39px;">Space</a></span></h3>
        <div style="margin-top: 13px;">
            <p><span style="color: #fff;">Liên kết:</span></p>
            <a style="text-align: center; color: #222;" href="http://ispacedanang.edu.vn/">http://ispacedanang.edu.vn/</a>
            <a style="text-align: center; color: #222;" href="http://ispacedanang.edu.vn/">https://aspace.edu.vn/</a>
        </div>
    </div>

    <div class="footer-center">
        <div>

            <p> <i class="fa fa-map-marker" style="margin-left: -80px; margin-bottom: -40px;"></i><span class="fa-address" style="margin-left: -56px">Địa chỉ:</span>18 Võ Văn Tần, Thanh Khê, Đà Nẵng</p>
        </div>

        <div>
            <i class="fa fa-phone" style=""></i>
            <p>Hotline: 0774 955 635</p>
        </div>
    </div>
</footer>

</html>