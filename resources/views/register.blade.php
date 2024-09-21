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
<h3>register page</h3>			  	</div>
				 
			  	<div class="card-body">
				  <form action="{{ route('postregister') }}" method="post">
    @csrf
    <!-- Name -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Name" name="name">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>

    <!-- Email -->
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    <!-- Password -->
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <!-- Referral Code (if applicable) -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Referral Code" name="referral_code">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user-friends"></span>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
			<a href="\">login</a>
        </div>
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