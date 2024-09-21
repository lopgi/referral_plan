<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
            @include('layouts.header')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			
				<!-- Brand Logo -->

				<!-- Sidebar -->
				@include('layouts.sidebar')
				<!-- /.sidebar -->
     
			<!-- Content Wrapper. Contains page content -->
		    @yield('content')
			<!-- /.content-wrapper -->
			@include('layouts.footer')
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('dist/js/demo.js')}}"></script>
	</body>
</html>