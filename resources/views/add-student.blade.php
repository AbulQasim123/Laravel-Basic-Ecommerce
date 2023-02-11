<?php 
	// if ($errors->any()) {
	// 	echo "<ul>";
	// 	foreach($errors->all() as $error){
	// 		echo "<li>".$error."</li>";
	// 	}
	// 	echo "</ul>";
	// }
		// Both ways is correct
?>
<!-- @if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
	<link rel="stylesheet" href="assets\css\bootstrap.css">
	<script type="text/javascript" src="assets\js\jquery.js"></script>
	<script type="text/javascript" src="assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="assets\js\mypopper.js"></script>
</head>
<body>
		<!-- Create and submit form to server -->
	<h1 align="center">Form Validation</h1><hr>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<!-- form validation validate method -->
				<h4>form Validation validate method()</h4>
				<form action="submit-student" method="post" >
					@csrf
					<p>Name: 
						<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Email: 
						<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
						@error('email')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Phone: 
						<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
						@error('phone')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p><button type="submit" class="btn btn-primary btn-sm">Submit</button></p>
				</form>
			</div>
			<div class="col-md-4">
				<h4>form Request class Validated method()</h4>
				<form action="add-student" method="post">
					@csrf
					<p>Name: 
						<input type="text" name="name_1" id="name_1" class="form-control" placeholder="Enter Name" value="{{ old('name_1') }}">
						@error('name_1')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Email: 
						<input type="text" name="email_1" id="email_1" class="form-control" placeholder="Enter Email" value="{{ old('email_1') }}">
						@error('email_1')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Phone: 
						<input type="text" name="phone_1" id="phone_1" class="form-control" placeholder="Enter Phone" value="{{ old('phone_1') }}">
						@error('phone_1')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p><button type="submit" class="btn btn-primary btn-sm">Submit</button></p>
				</form>
			</div>
			<div class="col-md-4">
				<h4>form Validation using validator facade</h4>
				<form action="create-student" method="post">
					@csrf
					<p>Name: 
						<input type="text" name="name_2" id="name_2" class="form-control" placeholder="Enter Name">
						@error('name_2')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Email: 
						<input type="text" name="email_2" id="email_2" class="form-control" placeholder="Enter Email">
						@error('email_2')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p>Phone: 
						<input type="text" name="phone_2" id="phone_2" class="form-control" placeholder="Enter Phone">
						@error('phone_2')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</p>
					<p><button type="submit" class="btn btn-primary btn-sm">Submit</button></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
