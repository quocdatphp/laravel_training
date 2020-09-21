<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="{{asset('Adminlte/images/icon/logo-icon.ico')}}">
	<meta name="description" content="au theme template">
	<meta name="author" content="Quốc Đạt">
	<meta name="keywords" content="au theme template">

	@yield('title')
	<!-- Fontfaces CSS-->
	<link href="{{asset('Adminlte/css/font-face.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="{{asset('Adminlte/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
	<link href="{{asset('Adminlte/vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="{{asset('Adminlte/css/theme.css')}}" rel="stylesheet" media="all">
	@yield('css')

</head>

<body class="animsition">
	<div class="page-wrapper">
		<!-- MENU SIDEBAR-->
		@include("partial.sidebar")
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container2">
			<!-- HEADER DESKTOP-->
			@include("partial.header")
			<!-- END HEADER DESKTOP-->
			@yield('content')
			<!-- END PAGE CONTAINER-->
		</div>

	</div>

	<!-- Jquery JS-->
	<script src="{{asset('Adminlte/vendor/jquery-3.2.1.min.js')}}"></script>
	<!-- Bootstrap JS-->
	<script src="{{asset('Adminlte/vendor/bootstrap-4.1/popper.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

	<script src="{{asset('Adminlte/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/wow/wow.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/animsition/animsition.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/counter-up/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/circle-progress/circle-progress.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/chartjs/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/vector-map/jquery.vmap.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/vector-map/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
	<script src="{{asset('Adminlte/vendor/vector-map/jquery.vmap.world.js')}}"></script>

	<!-- Main JS-->
	<script src="{{asset('Adminlte/js/main.js')}}"></script>
	@yield('js')

</body>

</html>
<!-- end document-->
