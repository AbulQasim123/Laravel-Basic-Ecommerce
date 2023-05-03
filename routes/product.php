<?php

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function(){
	Route::get('list-products', function(){
		echo "<h1 align='center'>Welcome to list Products page.</h1>";
		// return view('list-products');
	});
	Route::get('add-products', function(){
		echo "<h1 align='center'>Welcome to Add Product page.</h1>";
		// return view('add-product');
	});
});
