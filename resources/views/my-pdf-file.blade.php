<!DOCTYPE html>
<html>
<head>
    <title>Title From OnlineWebTutorBlog</title>
	<style>
		div img{
			border: 1px solid black;
			width: 100px;
			height: 100px;
			border-radius: 50%;
		}
	</style>
</head>
<body>
	<div align="center">
		<img src="{{ public_path('img/me.jpg') }}" alt="Error">
	</div>
    <h2>Title: {{ $title }}</h2>
	<h3>Aboutme: {{ $aboutme }}</h3>
	<p>
		My name is student AbulQasim. iam 22 years old. I have done SSC , HSC and ADCA.  Iam from Mumbai(Maharashtra). and i have done BCA in current year from Swami Vevikanand shubharti university(MEERUT). I have a lot of knowledge several programing lanuguage.
	</p><br>
	<h5 style="text-align:right">Thankyou</h5>
</body>
</html>