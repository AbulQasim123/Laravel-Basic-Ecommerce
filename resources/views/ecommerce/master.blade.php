<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Commerce</title>
	<link rel="stylesheet" href="\assets\css\bootstrap.css">
	<script type="text/javascript" src="\assets\js\jquery.js"></script>
	<script type="text/javascript" src="\assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="\assets\js\mypopper.js"></script>

		<!-- Jquery Lazyload -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!-- Tinymce Editor -->
	<script src="https://cdn.tiny.cloud/1/1lru45ycpjgbmkqsv1xrjwrvmxnsrs4f5qjg3qs0k6tqkv2y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
		body{
			background-color: #eee;
		}
		.custom-login{
			height: 525px;
			padding: 30px;
		}
		.custom-register{
			/* height: 530px; */
			padding: 30px;
		}
		.slide-img{
			height: 200px !important;
			width: 100%;
		}
		/* .custom-product{
			height: 600px;
		} */
		.slider-text{
			background-color: #35443585 !important;
		}
		.trending_img{
			margin: 5px;
			padding: 10px;
			width: 390px;
			height: 420px;
			background-color: white;
			text-align: center;
			box-shadow: 0 3px 4px  rgba(0,0,0,0.5);
			opacity: 0.9;
		}
		
	</style>
</head>
<body>
	{{ View::make('ecommerce.header') }}
	@yield('content')
	{{ View::make('ecommerce.footer') }}
	
	<!-- <img id="lazyload" data-original="image_path" alt=""> -->
	<script>
		$(document).ready(function(){
			// $('#lazyload').lazyload();
			tinymce.init({
				selector: '#tinyeditor',
				plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
				toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
				// tinycomments_mode: 'embedded',
				// tinycomments_author: 'Author name',
				// mergetags_list: [
				// 	{ value: 'First.Name', title: 'First Name' },
				// 	{ value: 'Email', title: 'Email' },
				// ],
			});
		})
		
	</script>
</body>
</html>