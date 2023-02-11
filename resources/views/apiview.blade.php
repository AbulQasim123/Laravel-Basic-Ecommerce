<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets\css\bootstrap.css">
	<link rel="stylesheet" href="DataTables\datatables.min.css">
	<script type="text/javascript" src="assets\js\jquery.js"></script>
	<script type="text/javascript" src="DataTables\datatables.min.js"></script>
	<script type="text/javascript" src="assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="assets\js\mypopper.js"></script>
</head>
<body>
<h3 align="center">How can Consume GET REST APIs | Http Client | Http::get()</h3>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-borderd" id="my_table">
					<thead>
						<tr>
							<th>UserId</th>
							<th>Id</th>
							<th>Title</th>
							<th>Body</th>
						</tr>
					</thead>
					<tbody>
						@foreach($apiposts as $apipost)
							<tr>
								<td>{{ $apipost->userId }}</td>
								<td>{{ $apipost->id }}</td>
								<td>{{ $apipost->title }}</td>
								<td>{{ $apipost->body }}</td>
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