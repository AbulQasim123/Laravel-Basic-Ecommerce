<h1>Welcome to my first method.</h1>
<h2>This is a simple view file.</h2>
<!-- @include("admin.dashboard"); -->
@extends('admin.dashboard');
<h3>{{ $my_name }}</h3>
<h3>{{ $my_email }}</h3>
<?php
		// PHP Ways syntaxes
    // if (isset($name)) {
	// 	echo $name;
	// }
	// if (empty($name)) {
	// 	echo $name;
	// }
?>
	<!-- Laravel Blade syntaxes -->
<!-- @isset($name)
	$name
@endisset
@empty($name)
	@name
@endempty -->