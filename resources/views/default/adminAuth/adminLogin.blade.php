<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Admin Login</title>	
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('icon') }}/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon') }}/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icon') }}/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon') }}/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="{{ asset('icon') }}/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('icon') }}/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icon') }}/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icon') }}/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icon') }}/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon') }}/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icon') }}/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icon') }}/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icon') }}/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icon') }}/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon') }}/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="{{ asset('js') }}/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('css') }}/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css') }}/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">Admin Login</h3>
				</div>
				<div class="card-body">
				
					@if (\Session::has('adminLoginMSG'))
						<div class="col-12 col-sm-12 alert alert-danger text-danger" style="padding:2px 2px;">
							{{ \Session::get('adminLoginMSG') }}
						</div>
					@endif

					<form action="{{ route('admin.login.submit') }}" method="post" class="admin_login_form">
						@csrf

						<div class="form-group">
							<label class="form-label" for="admin_login_email">Email address</label>
							<input type="email" class="form-control" id="admin_login_email" name="admin_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="admin_login_password">Password</label>
							<input type="password" class="form-control" id="admin_login_password" name="admin_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="admin_login_remember" name="admin_login_remember">
								<label class="custom-control-label" for="admin_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="{{ asset('js') }}/core/jquery-3.5.1.min.js"></script>
	<script src="{{ asset('js') }}/core/popper.min.js"></script>
	<script src="{{ asset('js') }}/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<!-- <script src="{{ asset('js') }}/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('js') }}/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> -->
	
	<!-- Atlantis JS -->
	<!-- <script src="{{ asset('js') }}/atlantis.min.js"></script> -->

</body>
</html>