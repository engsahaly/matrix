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
	<meta name="description" content="matrix clouds task">
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
	<!-- CSS Files -->	
	<link rel="stylesheet" href="{{ asset('css') }}/engsahaly.css">
	<link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css') }}/atlantis.min.css">
	<!-- jquery file -->
	<script src="{{ asset('js') }}/core/jquery-3.5.1.min.js"></script>

</head>
<body data-background-color="dark2">
	
	<div class="wrapper">
		
		<!-- include doctor header -->
		@include("default.partials.header")			
		
		<div class="main-panel" style="width:100%;">			
			<!-- include main contents -->
			@yield("mainContents")

			<!-- include doctor footer -->
			@include("default.partials.footer") 
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

	<!-- Atlantis JS -->
	<script src="{{ asset('js') }}/atlantis.min.js"></script>

	<!-- fontawesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	
</body>
</html>
