<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Request</title>
	<link rel="stylesheet" href="assets\css\bootstrap.css">
	<script type="text/javascript" src="assets\js\jquery.js"></script>
	<script type="text/javascript" src="assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="assets\js\mypopper.js"></script>
</head>
<body>
	<h3 align="center">Ajax Validation in laravel 8</h3>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="message" class="alert" style="display: none;"></div>
				<form>
					{{ csrf_field() }}
					<p>
						Name: <input type="text" name="name" id="name" class="form-control" />
						<span id="name"></span>
					</p>
					<p>
						Email: <input type="text" name="email" id="email" class="form-control">
						<span id="email"></span>
					</p>
					<p>
						Phone: <input type="text" name="phone" id="phone" class="form-control">
						<span id="phone"></span>
					</p>
					<p><button type="button" id="ajax_btn" class="btn btn-primary btn-sm">Submit</button></p>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#ajax_btn').click(function(e){
				e.preventDefault();
				// alert("hello");
				var _token = $("input[name='_token']").val();
				var name = $("input[name='name']").val();
				var email = $("input[name='email']").val();
				var phone = $("input[name='phone']").val();

				$.ajax({
					url: "{{ route('add.form') }}",
					method: "POST",
					data: {_token:_token,name:name,email:email,phone:phone},
					success: function(data){
						// if (data.success) {
							// alert(data.success);
							$('#message').css('display','block');
							$('#message').html(data.message);
							$('#message').addClass(data.class_name);
							$('form')[0].reset();
							// $('.print-error-msg').css({
							// 	display: "none"
							// })
						// }else{
							// PrintErrorMsg(data.error);
						// 	$('#message').html(data.error);
						// }
					}
				})
			})

			// function PrintErrorMsg(msg){
			// 	$('.print-error-msg').find('ul').html('');
			// 	$('.print-error-msg').css('display','block');
			// 	$.each(msg, function(key,value){
			// 		$('.print-error-msg').find("ul").append('<li>'+value+'</li>');
			// 	})
			// }
		})
	</script>
</body>
</html>