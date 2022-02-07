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
            background: yellow;
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
                                    <h4>CẬP NHẬT THÔNG TIN CÁ NHÂN</h4>
                                </div>

                                <div class="wow fadeInUp" data-wow-delay="0.8s" style="margin-bottom: 20px;">

                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">CMND</label>
                                        <input type="email" class="form-control" disabled id="email" name="email" value="20495589">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Mật khẩu</label>
                                        <input type="password" class="form-control" id="email" name="email" value="32787483743">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Họ và tên</label>
                                        <input type="email" class="form-control" disabled id="email" name="email"value="Lê Văn A">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Ngày sinh</label>
                                        <input type="email" class="form-control" disabled id="email" name="email" value="20-01-1990">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="levana@gmail.com">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Giới tính</label>
                                        <input type="email" class="form-control" id="email" name="email" value="Nam">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Số điện thoại</label>
                                        <input type="email" class="form-control" id="email" name="email" value="09232867">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Địa chỉ</label>
                                        <input type="email" class="form-control" id="email" name="email" value="20 Ông Ích Khiêm, Thanh Bình, Hải Châu">
                                    </div>
                                    <!-- <div class="col-md-6 col-sm-6">
                                        <label for="select">Chọn trẻ</label>
                                        <select class="form-control">
                                            <option>Lê Thị B</option>
                                            <option>Cardiology</option>
                                            <option>Dental</option>
                                            <option>Medical Research</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="date">Ngày tiêm mong muốn</label>
                                        <input type="date" name="date" value="" class="form-control">
                                    </div> -->


                                </div>
                                <div style="display: flex;flex-direction: row;">
                                    <button type="submit" style="width: 200px; margin-left: 20px; background: gray" class="form-control" id="cf-submit" name="cancle">Huỷ</button>

                                    <button type="submit" style="width: 200px; margin-left: 20px" class="form-control" id="cf-submit" name="submit">Cập nhật </button>

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
