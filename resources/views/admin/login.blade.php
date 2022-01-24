<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập hệ thống quản lý tiêm chủng</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
</head>
<body style="background-color: #cc9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="/admin/login/store" method="post">
					<span class="login100-form-title p-b-43">
						ĐĂNG NHẬP TÀI KHOẢN QUẢN LÝ TIÊM CHỦNG
					</span>
                    <!-- <div class="wrap-input100 validate-input" data-validate="Không được để trống!">
						<input class="input100" type="text" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Đơn vị công tác</span>
					</div> -->
            @include('admin.alert')

					<div class="wrap-input100 validate-input" data-validate = "Không được để trống!">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">email</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Không được để trống!">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Nhớ tài khoản
							</label>
						</div>
						<div>
							<a href="#" class="txt1">
								Quên mật khẩu?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
                    @csrf
				</form>
				<div class="login100-more" style="background-image: url('login/images/tiemchung.jpg');">
				</div>
			</div>
		</div>
	</div>
	<script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="/login/vendor/bootstrap/js/popper.js"></script>
	<script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/login/vendor/select2/select2.min.js"></script>
	<script src="/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="/login/js/main.js"></script>
</body>
</html>
