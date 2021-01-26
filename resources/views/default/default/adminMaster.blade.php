@if (Auth::guard('admin')->check())
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>@yield("seoTitle")</title>
	<!-- Meta Description -->
	<meta name="description" content="My Presonal Portfolio dashboard - copyright engsahaly@2020">
	<!-- Meta csrf -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<!-- <script src="{{ asset('js') }}/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('css') }}/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script> -->
	<!-- Bootstrap 4 cdn -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<!-- CSS Files -->	
	<link rel="stylesheet" href="{{ asset('css') }}/engsahaly.css">
	<link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css') }}/atlantis.min.css">
	<!-- jquery file -->
	<script src="{{ asset('js') }}/core/jquery-3.5.1.min.js"></script>
	<!-- jquery cdn -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
	<!-- CKEditor cdn -->
	<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

</head>
<body data-background-color="dark2">
	
	<div class="wrapper">
		
		<!-- include admin header -->
		@include("default.partials.adminHeader")
		
		<!-- include admin sidebar -->
		@include("default.partials.adminSide")
		
		<div class="main-panel">			
			<!-- include main contents -->
			@yield("mainContents")

			<!-- include admin footer -->
			@include("default.partials.adminFooter") 
		</div>
				
	</div>	

	<!--   Core JS Files   -->
	<script src="{{ asset('js') }}/core/popper.min.js"></script>
	<script src="{{ asset('js') }}/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('js') }}/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('js') }}/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('js') }}/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Datatables -->
	<!-- <script src="{{ asset('js') }}/plugin/datatables/datatables.min.js"></script> -->

	<!-- Bootstrap Notify -->
	<!-- <script src="{{ asset('js') }}/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- Sweet Alert -->
	<!-- <script src="{{ asset('js') }}/plugin/sweetalert/sweetalert.min.js"></script> -->

	<!-- Atlantis JS -->
	<script src="{{ asset('js') }}/atlantis.min.js"></script>

	<!-- fontawesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	
</body>
</html>

@else
	<script>window.location.href= "{{ url('/admin/login') }}";</script>
@endif
