<!DOCTYPE html>
<html lang="en">

<head>
    <title>DaNaVC - Hệ thống tiêm chủng Đà Nẵng</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="user/css/bootstrap.min.css">
    <link rel="stylesheet" href="user/css/font-awesome.min.css">
    <link rel="stylesheet" href="user/css/animate.css">
    <link rel="stylesheet" href="user/css/owl.carousel.css">
    <link rel="stylesheet" href="user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="user/css/tooplate-style.css">
    <style>
        .dangky-main {
            display: flex;
            /* flex-wrap: wrap; */
            /* width: 70%; */
            gap: 30px;
            background: #F5F5F5;
            justify-content: space-around;
            padding: 30px 190px;
        }

        .form-dk {
            width: 100%;
            height: auto;
            /* background: red; */
            padding-bottom: 20px;
        }

        .vaccine {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        /* .cau-hoi {
            width: 20%;
            height: 300px;
            background: pink;
        } */
        .a {
            width: calc(100%/4 - 20px);
            height: 120px;
            background: #fff;
            border: 1px solid #0002;
            border-radius: 10px;
        }

        #appointment-form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section> -->
    <!-- HEADER -->
    @include('header')
    @include('admin.alert')

    <!-- HOME -->
    <div class="dangky-main">
        <div class="form-dk">
            <section id="appointment" data-stellar-background-ratio="3">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-sm-6" style="width:100%; background: red">

                            <h3>Mời bạn đăng nhập tài khoản hụ huynh để thục hiện đăng ký! </h3>


                                    @foreach($phieudk as $dk )
                                    <p>{{$dk->id}}</p>
                                    @endforeach

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('footer')

    <!-- SCRIPTS -->
    <script src="user/js/jquery.js"></script>
    <script src="user/js/bootstrap.min.js"></script>
    <script src="user/js/jquery.sticky.js"></script>
    <script src="user/js/jquery.stellar.min.js"></script>
    <script src="user/js/wow.min.js"></script>
    <script src="user/js/smoothscroll.js"></script>
    <script src="user/js/owl.carousel.min.js"></script>
    <script src="user/js/custom.js"></script>
    <!--  -->
    <!-- item -->


</body>

</html>
