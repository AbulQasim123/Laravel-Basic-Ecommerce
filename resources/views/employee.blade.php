<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee</title>
	<link rel="stylesheet" href="assets\css\bootstrap.css">
	<link rel="stylesheet" href="DataTables\datatables.min.css">
	<script type="text/javascript" src="assets\js\jquery.js"></script>
	<script type="text/javascript" src="DataTables\datatables.min.js"></script>
	<script type="text/javascript" src="assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="assets\js\mypopper.js"></script>
</head>
<body>
	<?php
		// if (session()->has('success')) { ?>
			<h3><?php //echo session('success'); ?></h3>
	<?php //} ?>
	
	<h3 align="center">Read, Create, Update and Delete data to database table</h3><hr>
	@if(session()->has('success'))
		<div class="alert text-center text-dark alert-sm alert-success alert-dismissable" style="font-style: itacli;font-size:20px;"><button class="close" data-dismiss="alert">&times;</button>
			{{ session('success') }}
		</div>
	@endif
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<form action="save-employee" method="post">
					@csrf
					<p>
						Name: <input type="text" name="name" id="name" class="form-control" />
					</p>
					<p>
						Email: <input type="text" name="email" id="email" class="form-control">
					</p>
					<p>
						Phone: <input type="text" name="phone" id="phone" class="form-control">
					</p>
					<p>
						Gender: <input type="text" name="gender" id="gender" class="form-control">
					</p>
					<p><button type="submit" class="btn btn-primary btn-sm">Submit</button></p>
				</form>
			</div>
			<div class="col-md-9">
				<div class="table-responsive">
					<table class="table table-borderd table-sm" id="my_table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Gender</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($students as $student)
								<tr>
									<td>{{ $student->id }}</td>
									<td>{{ $student->name }}</td>
									<td>{{ $student->email }}</td>
									<td>{{ $student->phone }}</td>
									<td>{{ $student->gender }}</td>
									<td>{{ $student->created_at }}</td>
									<td>
										<a href="edit/{{$student->id}}" class="btn btn-info btn-sm">Edit</a>
										<a href="delete/{{$student->id}}" class="btn btn-primary btn-sm">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#my_table').DataTable();
		})
	</script>
</body>
</html>