<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>project</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">login Panel</a>
			  	</div>
				 
			  	<div class="card-body">
				  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
	
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">
{{Session::get('fail')}}
</div>
@endif
					<form action="{{route('postlogin')}}" method=post>
						@csrf
				  		<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Email"name="email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
				  		</div>
				  		<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Password"name="password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
				  		</div>
				  		<div class="row">
							
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
                                <a href="\register">signup here?</a>
							</div>
							<!-- /.col -->
				  		</div>
					</form>
		  						
			  	</div>
			  	<!-- /.card-body -->
			</div>
			<!-- /.card -->
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