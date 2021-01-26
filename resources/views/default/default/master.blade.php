@php  	
  	use \App\Http\Controllers\SettingController;
	$settings = SettingController::allSettings();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">	

	<title>
        @yield('seoTitle') 
    </title>
	<!-- set your website meta description and keywords -->
	<meta name="description" content="@yield('seoDescription')">
	<meta name="keywords" content="@yield('seoKeywords')">
	<!-- set your website favicon -->
	<link href="favicon.ico" rel="icon">
	
	<!-- Bootstrap Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
	<!-- Font Awesome Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/font-awesome.min.css">
	
	<!-- Owl Carousel Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('css') }}/owl.theme.default.min.css">
	<!-- Lightbox Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/lightbox.min.css">
	<!-- Parallax Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/parallax.css" type="text/css">
	<!-- Template Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/style.css" type="text/css">
	<!-- Responsive Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/responsive.css" type="text/css">
	<!-- ENGSAHALY Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css') }}/mystyle.css" type="text/css">
	<!-- Jquery -->
	<script src="{{ asset('js') }}/jquery-3.4.1.min.js"></script>
	
</head>

<body>

    @include("default.partials.header")

    @yield("mainContents")

    @include("default.partials.footer")
    

<a href="#" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
	
<!-- TWITTER SHARE -->	
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<!-- jQuery Library -->
<script src="{{ asset('js') }}/jquery-3.4.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('js') }}/bootstrap.min.js"></script>
<!-- Circle Progress Js -->
<script src="{{ asset('js') }}/circle-progress.js"></script>
<!-- Isotope Filtring Js -->
<script src="{{ asset('js') }}/isotope.pkgd.min.js"></script>
<!-- Lightbox Js -->
<script src="{{ asset('js') }}/lightbox.min.js"></script>
<!-- owl.carousel Js -->
<script src="{{ asset('js') }}/owl.carousel.min.js"></script>
<!-- Form validator Js -->
<script src="{{ asset('js') }}/validator.min.js"></script>
<!-- ajaxchimp Js -->
<script src="{{ asset('js') }}/jquery.ajaxchimp.min.js"></script>
<!-- counterup Js -->
<script src="{{ asset('js') }}/waypoint.js"></script>	
<script src="{{ asset('js') }}/jquery.counterup.min.js"></script>
<!-- Template main Js -->
<script src="{{ asset('js') }}/main.js"></script>
<!-- ENGSAHALY fontawesome kit -->
<script src="https://kit.fontawesome.com/fc383a6465.js" crossorigin="anonymous"></script>

	
</body>
</html>