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
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>
    <!-- HEADER -->
    @include('header')
    <!-- HOME -->
    <div class="dangky-main">
        <div class="form-dk">
            <section id="appointment" data-stellar-background-ratio="3">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-sm-6" style="width:100%">
                            <!-- CONTACT FORM HERE -->
                            <form id="appointment-form" role="form" method="post" action="#">

                                <!-- SECTION TITLE -->
                                <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                    <h4>ĐĂNG KÝ TIÊM CHO CON</h4>
                                </div>

                                <div class="wow fadeInUp" data-wow-delay="0.8s" style="margin-bottom: 20px;">


                                    <div class="col-md-6 col-sm-6">
                                        <label for="select">Chọn trẻ</label>
                                        <select class="form-control">
                                            <option>Lê Thị B</option>
                                            <option>Lê Thị C</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="date">Ngày tiêm mong muốn</label>
                                        <input type="date" name="date" value="" class="form-control">
                                    </div>
                                    <div class="col-md-12 col-sm-12">

                                        <div class="form-group row">
                                            <div class="vaccine">

                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input name="id_VX" type="checkbox" class="check-vx" id="gender">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>Teraxiu (Mỹ)</b></div>
                                                                <div class="vaccine__price" style="color: red;">200.000 VND</div>
                                                            </div>

                                                            <div class="vaccine__description">Thuỷ đậu cho trẻ dưới 12 tháng tuổi</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input name="id_VX" type="checkbox" class="check-vx" id="gender">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>Libtin (Anh)</b></div>
                                                                <div class="vaccine__price" style="color: red;">670.000 VND</div>
                                                            </div>

                                                            <div class="vaccine__description">Viêm màn não Nhật Bản</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input name="id_VX" type="checkbox" class="check-vx" id="gender">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>Politepxic (Nhật Bản)</b></div>
                                                                <div class="vaccine__price" style="color: red;">389.000 VND</div>
                                                            </div>

                                                            <div class="vaccine__description">Ho gà, cúm</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input name="id_VX" type="checkbox" class="check-vx" id="gender">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>Pentamin (Việt Nam)</b></div>
                                                                <div class="vaccine__price" style="color: red;">900.000 VND</div>
                                                            </div>

                                                            <div class="vaccine__description">Bạch hầu</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input name="id_VX" type="checkbox" class="check-vx" id="gender">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>Mintabin (Mỹ)</b></div>
                                                                <div class="vaccine__price" style="color: red;">980.000 VND</div>
                                                            </div>

                                                            <div class="vaccine__description">6 trong 1 </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="display: flex;flex-direction: row;">
                                    <button type="submit" style="width: 200px; margin-left: 20px; background: gray" class="form-control" id="cf-submit" name="cancle">Huỷ</button>

                                    <button type="submit" style="width: 200px; margin-left: 20px" class="form-control" id="cf-submit" name="submit">Đăng ký</button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </section>

        </div>
        <!-- <div class="cau-hoi">

        </div> -->
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
