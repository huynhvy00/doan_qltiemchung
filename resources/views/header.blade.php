
<header>
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-5">
                <p>Chào mừng đến với hệ thống tiêm chủng Đà Nẵng</p>
            </div>

            <div class="col-md-8 col-sm-7 text-align-right">
                <span class="phone-icon"><i class="fa fa-phone"></i> 036-450-7725</span>
                <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Thứ 2 - Thứ 7)</span>
                <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">danavc@injection.com</a></span>
            </div>

        </div>
    </div>
</header>


<!-- MENU -->
<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="/"><img src="images/LOGO2.png" alt="" width="50px" /></a>
            <strong>HỆ THỐNG TIÊM CHỦNG ĐÀ NẴNG</strong>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" id="menu">
                <li><a href="/" class="smoothScroll">Trang chủ</a></li>
                <li><a href="/gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
                <li><a href="{{asset('vaccines')}}" class="smoothScroll">Vắc xin</a></li>
                <li><a href="/dang-ky-tiem" class="smoothScroll">Đăng ký tiêm</a></li>
                <li><a href="/lich-trinh" class="smoothScroll">Lịch trình</a></li>
                <li><a href="/benh-hoc" class="smoothScroll">Bệnh học</a></li>
                <li><a href="/cap-nhat-tai-khoan-ca-nhan" class="smoothScroll">Tra cứu</a></li>
                @if (session()->has('phuhuynh'))
                <li class="appointment-btn">

                <a href="javascript:void(0)">
                    {{ session('tenPH')}}
                    <span class="arrow arrow-down"></span>
                </a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="/cap-nhat-thong-tin-ca-nhan">Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">Đăng xuất</a>
                    </li>
                </ul>
                </li>
                @else
                <li class="appointment-btn">
                    <a href="{{ url('/loginUser') }}" >Đăng nhập</a>
                </li>
                @endif

            </ul>
        </div>


    </div>
</section>
<script>
    $('#menu > li').hover(function() {
        // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.dropdown_menu', this).slideDown();
    }, function() {
        // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
        $('.dropdown_menu', this).slideUp();
    });

    $('.dropdown_menu > li').hover(function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.submenu', this).slideDown();
    }, function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt lên(ẩnẩn)
        $('.submenu', this).slideUp();
    });
</script>
