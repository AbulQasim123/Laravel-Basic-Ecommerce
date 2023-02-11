<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxValidationController;
use App\Http\Controllers\HomeController;
      /* Ajax Validation in laravel 8 */
Route::get('ajax-form',[AjaxValidationController::class,'AjaxForm']);
Route::post('submit-form',[AjaxValidationController::class,'SubmitForm'])->name('add.form');

      /* PDF generate using DOM PDF */
Route::get('generate-pdf',[AjaxValidationController::class,'GeneratePdf']);

      /* Barcode Generator in Laravel 8 Tutorial */
Route::get('barcode',[AjaxValidationController::class,'Barcode'])->name('barcode.Barcode');

    /* 
        Let's know How to find laravel version 
		1:- php artisan --version
		2:- php -V
		3:- Third is below
    */
Route::get('get-version', function(){
	$version = app()->version();
	dd($version);
});