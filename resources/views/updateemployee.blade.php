<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<link rel="stylesheet" href="\assets\css\bootstrap.css">
	<script type="text/javascript" src="\assets\js\jquery.js"></script>
	<script type="text/javascript" src="\assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="\assets\js\mypopper.js"></script>
</head>
<body>
<h1 align="center">Update data from the database table</h1><hr>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<form action="/update-employee" method="post">
					@csrf
					<p>
						<input type="hidden" name="student_id" value="{{ $students->id }}">
						Name: <input type="text" name="name" id="name" class="form-control" value="{{ $students->name }}" />
					</p>
					<p>
						Email: <input type="text" name="email" id="email" class="form-control" value="{{ $students->email }}" />
					</p>
					<p>
						Phone: <input type="text" name="phone" id="phone" class="form-control" value="{{ $students->phone }}" />
					</p>
					<p>
						Gender: <input type="text" name="gender" id="gender" class="form-control" value="{{ $students->gender }}" />
					</p>
					<p><button type="submit" class="btn btn-primary btn-sm">Update</button></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>