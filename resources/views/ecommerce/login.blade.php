@extends('ecommerce.master')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	@section('content')
				<!-- Logging Modal -->
<div class="container custom-login">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			@if(session()->has('success'))
				<div class="alert alert-success my-3">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>{{ session()->get('success') }}</h4>
				</div>
			@endif
					<!-- Not logging, trying to Add Cart -->
			@if(session()->has('first_login'))
				<div class="alert alert-danger my-3">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>{{ session()->get('first_login') }}</h4>
				</div>
			@endif
			<div class="jumbotron" style="background-color: white;">
				<h4 style="margin-top: -55px;">Login</h4>
				@if(Session::has('error'))
					<div class="text-danger text-center"style="font-size: 18px;">{{ Session::get('error') }}</div>
				@endif

				<form action="{{ route('post.login') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="login_email">Email address:</label>
						<input type="email" class="form-control" value="{{ old('login_email') }}" placeholder="Enter email" id="login_email" name="login_email">
						@if($errors->has('login_email'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('login_email') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<label for="login_password">Password:</label>
						<input type="password" class="form-control" placeholder="Enter password" id="login_password" name="login_password">
						@if($errors->has('login_password'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('login_password') }}
							</span>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					<a href="register" class="float-right" style="margin-top: 50px">Create An Account</a>
				</form>
			</div>
		</div>
	</div>	
</div>
@endsection
</body>
</html>