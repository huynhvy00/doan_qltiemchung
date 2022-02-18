<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập</title>

    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <a href="/"><img src="images/LOGO2.png" class="logo-name" alt="" width="100px" style="margin: 20px;" /></a>

            </div>
            <h2>HỆ THỐNG TIÊM CHỦNG ĐÀ NẴNG</h2>
            @include('admin.alert')

            <form class="m-t" role="form" action="/login/store" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="CMND" placeholder="Chứng minh nhân dân" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="required">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                <a href="#"><small>Quên mật khẩu?</small></a>
                @csrf
            </form>
            <p class="m-t"> <small>Hệ thống tiêm chủng Đà Nẵng &copy; 2022</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/admin/js/jquery-3.1.1.min.js"></script>
    <script src="/admin/js/popper.min.js"></script>
    <script src="/admin/js/bootstrap.js"></script>

</body>

</html>
