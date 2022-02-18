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

                                <div class="wow" data-wow-delay="0.8s" style="margin-bottom: 20px;">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="select">Chọn trẻ</label>
                                        <select class="form-control">
                                            @foreach($treem as $te)
                                            @if (session()->has('phuhuynh') == $te->id_PH)
                                            <option value="{{$te->code}}">{{$te->tenTre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="date">Ngày tiêm mong muốn</label>
                                        <input type="date" name="ngayDKTiem" value="" class="form-control">
                                    </div>
                                    <div class="col-md-12 col-sm-12">

                                        <div class="form-group row">
                                            <div class="vaccine">
                                                @foreach($vaccine as $vx)
                                                @if($vx->ghiChu==1)

                                                <div class="a">
                                                    <div class="item-vx">
                                                        <input type="checkbox" id="" name="id_VX[]" value="{{ $vx->id}}">
                                                        <div class="detail-vx">

                                                            <div class="vaccine__metas">
                                                                <div class="vaccine__name"><b>{{$vx->tenVX}}</b></div>
                                                                <div class="vaccine__price" style="color: red;">Giá: {{ number_format($vx->donGia,0,',','.').' đ'}}</div>
                                                            </div>
                                                            @foreach($benh as $b)
                                                            @if($vx->code == $b->code)
                                                            <div class="vaccine__description">{{$b->tenBenh}}</div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: flex;flex-direction: row;">
                                    <button type="submit" style="width: 200px; margin-left: 20px; background: gray" class="form-control" id="cf-submit" name="cancle">Huỷ</button>
                                    <button type="submit" style="width: 200px; margin-left: 20px" class="form-control" id="cf-submit" name="submit">Đăng ký</button>
                                </div>
                                @csrf
                            </form>
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
