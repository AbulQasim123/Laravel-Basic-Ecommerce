<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>language</title>
	<link rel="stylesheet" href="\assets\css\bootstrap.css">
	<link rel="stylesheet" href="\DataTables\datatables.min.css">
	<script type="text/javascript" src="\assets\js\jquery.js"></script>
	<script type="text/javascript" src="\DataTables\datatables.min.js"></script>
	<script type="text/javascript" src="\assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="\assets\js\mypopper.js"></script>
</head>
<body>
<h2 align="center">How to Create Multi Language Website in Laravel.<h2><hr>
	<div class="container">
		<div class="row" style="text-align: center;margin-top: 40px;">
			<div class="col-md-4 col-md-offset-6 text-right">
				<h5>Select Language</h5>
			</div>
			<div class="col-md-4">
				<select class="form-control LangChange">
					<option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
					<option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
					<option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option>
					<option value="tu" {{ session()->get('locale') == 'tu' ? 'selected' : '' }}>Turkish</option>
				</select>
			</div>
			
			<div class="my-5">
				<h1>{{ __('message.page_title') }}</h1>
				<h2>{{ __('message.welcome_message') }}</h2>
				<h3>{{ __('message.author_information') }}</h3>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
    var url = "{{ route('LangChanges') }}";
    $(".LangChange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
		// console.log('hello');
    });
</script>
</html>