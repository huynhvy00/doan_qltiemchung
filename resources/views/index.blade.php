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
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>
    <!-- HEADER -->
    @include('header')
    <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Hãy để chúng tôi chăm sóc bạn</h3>
                                <h1>Bảo vệ trẻ em</h1>
                                <a href="#team" class="section-btn btn btn-default smoothScroll">Liên hệ ngay</a>
                            </div>
                        </div>
                    </div>

                    <div class="item item-second">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Tránh xa nguy hiểm</h3>
                                <h1>Bảo vệ gia đình</h1>
                                <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Liên hệ ngay</a>
                            </div>
                        </div>
                    </div>

                    <div class="item item-third">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Phòng ngừa các loại bệnh</h3>
                                <h1>Bảo vệ xã hội</h1>
                                <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Liên hệ ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h3 class="wow fadeInUp" data-wow-delay="0.6s">Giới thiệu hệ thống</h3>
                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <p>
                                Hệ thống tiêm chủng DANAVC chính thức đi vào hoạt động từ tháng 01 năm 2022. Trong bối cảnh
                                thế giới đang phải đương đầu với tình trạng biến đổi phức tạp của các chủng vi khuẩn gây bệnh
                                 cũng như sự thiếu hụt vắc xin như hiện nay,
                                Hệ thống tiêm chủng DANAVC ra đời nhằm hỗ trợ việc cung cấp vắc xin cho trẻ em đầy đủ và nhanh chóng.
                                Đi kèm chất lượng, hệ thống giúp đội ngũ y tế có thể quản lý tốt thông tin trẻ tại địa bàn thành phố Đà Nẵng.
                                . DANAVC đã xây dựng dây chuyền bảo quản lạnh (Cold chain) đạt tiêu chuẩn GSP với chất lượng tốt nhất cùng
                                với hệ thống phòng tiêm chủng an toàn, hiện đại và cao cấp…
                                <a href="">Xem thêm</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- TEAM -->
    <section id="team" data-stellar-background-ratio="1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" id="khuvuc" margin-bottom:20px">Các khu vực </h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="contact">
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/cl.jpg" class="img-responsive" alt="" id="img-contact" />

                            <div class="team-info">
                                <h5>Trung tâm tại quận Cẩm Lệ</h5>
                                <div class="team-contact-info">
                                    <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">camlevc@.com</a></p>
                                    <p><i class="fa fa-map-marker"></i> 30 Bình Thái 1, Cẩm Lệ</p>

                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/nhs.png" class="img-responsive" alt="" id="img-contact" />

                            <div class="team-info">
                                <h5>Trung tâm tại quận Ngũ Hành Sơn</h5>
                                <div class="team-contact-info">
                                    <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">nguhanhsonvc@.com</a></p>
                                    <p><i class="fa fa-map-marker"></i> 19 Trương Định</p>

                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/hc.jpg" class="img-responsive" alt="" id="img-contact" />

                            <div class="team-info">
                                <h5>Trung tâm tại quận Hải Châu</h5>
                                <div class="team-contact-info">
                                    <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">haichauvc@.com</a></p>
                                    <p><i class="fa fa-map-marker"></i> 108 Lê Đình Lý</p>

                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/lc.jpg" class="img-responsive" alt="" id="img-contact" />

                            <div class="team-info">
                                <h5>Trung tâm tại quận Liên Chiểu</h5>
                                <div class="team-contact-info">
                                    <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">lienchieuvc@.com</a></p>
                                    <p><i class="fa fa-map-marker"></i> 110 Tôn Đức Thắng</p>

                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/sontra.jpg" class="img-responsive" alt="" id="img-contact" />

                            <div class="team-info">
                                <h5>Trung tâm tại quận Sơn Trà</h5>
                                <div class="team-contact-info">
                                    <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">sontravc@.com</a></p>
                                    <p><i class="fa fa-map-marker"></i> 20 Mân Quang</p>

                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>

    <!-- NEWS -->

    <section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" id="tit" data-wow-delay="0.1s">
                        <h3>Danh mục Vắc xin</h3>
                        <a id="more" href="">Xem tất cả</a>
                    </div>
                    <hr>

                </div>

                <div class="col-md-4 col-sm-6" id="item">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <a href="news-detail.html">
                            <img src="images/vx/vx1.jpg" class="img-responsive" alt="">
                        </a>
                        <div class="news-info">
                            <span>Vắc xin VARILRIX (Bỉ) phòng bệnh thủy đậu</span>
                            <span>Giá: 200.000 VND</span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6" id="item">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <a href="news-detail.html">
                            <img src="images/vx/vx2.png" class="img-responsive" alt="">
                        </a>
                        <div class="news-info">
                            <span>IMOJEV – Vắc xin phòng viêm não Nhật Bản thế hệ mới</span>
                            <span>Giá: 290.000 VND</span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" id="item">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <a href="news-detail.html">
                            <img src="images/vx/vx3.jpg" class="img-responsive" alt="">
                        </a>
                        <div class="news-info">
                            <span>Vắc xin ENGERIX B (Bỉ) phòng bệnh viêm gan B</span>
                            <span>Giá: 900.000 VND</span>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--  -->
    <section id="team" data-stellar-background-ratio="1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6" style="width:100%">
                    <div class="about-info" style="display: flex; flex-direction: row;justify-content: space-between;">
                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" id="khuvuc" margin-bottom:20px">Tin tức</h3>
                        <a id="more" href="">Xem tất cả</a>
                    </div>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <div id="contact">
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/tintuc/tt2.jpg" class="img-responsive" alt="" id="img-" />

                            <div class="team-info">
                                <h5>BÙNG NỔ CHUỖI ƯU ĐÃI LỚN NHẤT NĂM: PHÒNG BỆNH CHO CẢ NHÀ ĐÓN TẾT BÌNH AN</h5>
                                <div class="team-contact-info">
                                    <p>Mừng giáng sinh và năm mới, VNVC bùng nổ hàng loạt ưu đãi hấp dẫn, quà tặng giá trị,
                                        hỗ trợ đặt vắc xin miễn phí, đặc biệt bộ đôi vắc xin Hot nhất...</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/tintuc/tt1.jpg" class="img-responsive" alt="" id="img-" />

                            <div class="team-info">
                                <h5>ĐỪNG ĐỂ MẤT TẾT VÌ THỦY ĐẬU!</h5>
                                <div class="team-contact-info">
                                    <p>Tết Nguyên đán trùng với thời điểm tăng cao bệnh thủy đậu. Giao lưu đi lại nhiều càng
                                        khiến người lớn dễ mắc thủy đậu, biến chứng nguy hiểm nếu không...</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/tintuc/tt3.jpg" class="img-responsive" alt="" id="img-" />
                            <div class="team-info">
                                <h5>VNVC TIẾP TỤC KÝ THÀNH CÔNG HỢP ĐỒNG ĐẶT MUA 25 TRIỆU LIỀU VẮC XIN COVID-19 CỦA ASTRAZENECA</h5>
                                <div class="team-contact-info">
                                    <p>Hợp đồng đặt mua 25 triệu liều vắc xin Covid-19 tiếp theo cho năm 2022 được
                                        đàm phán song phương với AstraZeneca và đi đến...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/tintuc/tt2.jpg" class="img-responsive" alt="" id="img-" />
                            <div class="team-info">
                                <h5>GIỚI THIỆU TRUNG TÂM TIÊM CHỦNG</h5>
                                <div class="team-contact-info">
                                    <p>Hệ thống tiêm chủng VNVC ra đời nhằm cung cấp cho trẻ em Việt Nam những loại vắc
                                        xin có chất lượng tốt nhất.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GOOGLE MAP -->
    <section id="google-map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>


    <!-- FOOTER -->
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
