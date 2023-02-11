<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title")</title>
	<link rel="stylesheet" href="\assets\css\bootstrap.css">
	<link rel="stylesheet" href="\DataTables\datatables.min.css">
	<script type="text/javascript" src="\assets\js\jquery.js"></script>
	<script type="text/javascript" src="\DataTables\datatables.min.js"></script>
	<script type="text/javascript" src="\assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="\assets\js\mypopper.js"></script>
</head>
<body>
   	<div class="container">
		@if(session()->has('success'))
			<div class="alert alert-success my-3" id="dismiss">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ session('success') }}
			</div>
		@endif
		@section("body")
		@show()
	</div>
	<script>
		$().ready(function(){
			setTimeout(() => {
				$('#dismiss').remove();
			}, 5000);
		})
	</script>
</body>
</html>