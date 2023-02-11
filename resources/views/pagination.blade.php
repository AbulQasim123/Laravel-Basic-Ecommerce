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
	<style>
	</style>
</head>
<body>
	<h3 align="center" class="my-3">Pagination in laravel</h3>
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-sm" id="my_table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Title</th>
								<th>Discription</th>
								<th>Price</th>
								<th>Brand</th>
								<th>Color</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($Products) && $Products->count())
							@foreach($Products as $Product)
								<tr>
									<td>{{ $Product->pro_id }}</td>
									<td>{{ $Product->pro_name }}</td>
									<td>{{ $Product->pro_title }}</td>
									<td>{{ $Product->pro_discription }}</td>
									<td>{{ $Product->pro_price }}</td>
									<td>{{ $Product->pro_brand }}</td>
									<td>{{ $Product->pro_color }}</td>
									<td><img id="lazyload" src="{{ asset('all_products/'. $Product->pro_img) }}" alt="Error" style="width: 40px; height: 40px"></td>
									
								</tr>
							@endforeach
							@else
								<tr>
									<td colspan="6" align="center" style="font-size: 20px; color:red;">There are no data.</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $Products->links() }}
				</div>
			</div>
		</div>
	</div>
	
	<script>
		// $(document).ready(function(){
		// 	$('#my_table').DataTable();
		// })
	</script>
</body>
</html>