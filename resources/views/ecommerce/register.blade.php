@extends('ecommerce.master')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
@section('content')
			<!-- Registering Modal -->
<div class="container custom-register">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="jumbotron " style="background-color: white;">
				<h4 style="margin-top: -55px;">Create Account</h4>
				<form action="{{ route('post.register') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="create_name">Your Name</label>
						<input type="text" class="form-control" value="{{ old('create_name') }}" placeholder="Enter Name" id="create_name" name="create_name">
						@if($errors->has('create_name'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('create_name') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<label for="create_phone">Phone Number</label>
						<input type="text" class="form-control" value="{{ old('create_phone') }}" placeholder="Enter Phone" id="create_phone" name="create_phone">
						@if($errors->has('create_phone'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('create_phone') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<label for="create_email">Email address:</label>
						<input type="text" class="form-control" value="{{ old('create_email') }}" placeholder="Enter Email" id="create_email" name="create_email">
						@if($errors->has('create_email'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('create_email') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<label for="create_password">Password:</label>
						<input type="password" class="form-control" value="{{ old('create_password') }}" placeholder="Enter password" id="create_password" name="create_password">
						@if($errors->has('create_password'))
							<span class="text-danger" style="font-size: 20px; font-style:italic">
								{{ $errors->first('create_password') }}
							</span>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
					<a href="login" class="float-right" style="margin-top: 50px">Already have an Account.</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
</body>
</html>