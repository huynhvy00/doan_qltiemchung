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
    <!-- item -->

    <!--  -->
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
<div class="vaccine-list">
<section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" id="tit" data-wow-delay="0.1s">
                        <h3>Danh mục Vắc xin</h3>
                        <form method="get">
                                <div class="page-title-wrapper">
                                    <div class="app-header__content">
                                        <div class="app-header-left">
                                            <div class="search-wrapper active">
                                                <div class="input-holder">
                                                    <input type="text" class="search-input" placeholder="Type to search" name="key_search">
                                                    <button class="search-icon"><span>search</span></button>
                                                </div>
                                                <button type="button" class="close"></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="page-title-actions">
                                        <div class="mb-2 mr-2 btn-group">
                                            <button class="btn btn-focus"> <i class="pe-7s-filter"></i></button>
                                            <select name="filter" id="exampleSelect" class="dropdown-toggle-split dropdown-toggle btn btn-focus">
                                                    <option value="">--Choose an option--</option>
                                                    <option value="code">Mã số sinh viên</option>
                                                    <option value="name">Tên sinh viên</option>
                                                    <option value="course">Khoá học</option>
                                                </select>
                                        </div>
                                    </div>    -->
                                </div>
                            </form>
                    </div>
                    <hr>

                </div>
                @foreach($vaccine as $vx)
                <div class="col-md-4 col-sm-6" id="item">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <a href="news-detail.html">
                            <img src="/images/vx/{{ $vx->anh }}" width="250px !important" height="200px !important" class="img-responsive" alt="">
                        </a>
                        <div class="news-info">
                            <span>{{$vx->tenVX}}</span>
                            <span>Giá:  {{ number_format($vx->donGia,0,',','.').' đ'}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>
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
