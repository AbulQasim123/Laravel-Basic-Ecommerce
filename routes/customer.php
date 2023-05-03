<?php
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function(){
	Route::get('list-customers', function(){
		echo "<h1 align='center'>Welcome to list Customers page.</h1>";
		// return view('list-customers');
	});
	Route::get('add-customers', function(){
		echo "<h1 align='center'>Welcome to Add Customer page.</h1>";
		// return view('add-customer');
	});
});