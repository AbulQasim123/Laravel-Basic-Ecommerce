<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MultiLanguage;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DeviceController;
use App\Models\Student;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
// Send Varification Email address
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        // This is StudentController.php route
Route::get('my-form',[StudentController::class,'myForm']);
Route::post('submit-student',[StudentController::class,'SubmitStudent']);
Route::post('add-student',[StudentController::class,'AddStudent']);
Route::post('create-student',[StudentController::class,'CreateStudent']);

		// Route Model binding
Route::get('student/{student:id}', function(Student $student){
	echo "<pre>";
		echo $student->name;
	echo "<pre>";
});
Route::get('student/{student}',[EmployeeController::class,'Student']);


		// Pagination in laravel
Route::get('pagination',[StudentController::class,'Pagination']);


		// Concept of trait method in laravel Students Devices
Route::get('get-students', [StudentController::class,'GetStudents']);
Route::get('get-devices', [StudentController::class, 'GetDevices']);


		// url helper function
Route::get('/test', function(){
	// echo url('sample');
	// echo url()->current();
	// echo url()->full();
			// or
	// echo URL::full();
	echo URL::current();
});
Route::get('/sample', function(){
	echo "This is sample";
});

        // This is EmployeeController.php route
Route::get('employee', [EmployeeController::class,'Employee']);
Route::post('save-employee',[EmployeeController::class,'SaveEmployee']);
Route::get('employee',[EmployeeController::class,'GetEmlpoyee']);
Route::get('delete/{id}',[EmployeeController::class,'DeleteEmployee']);
Route::get('edit/{id}',[EmployeeController::class,'ShowEmployee']);
Route::post('update-employee',[EmployeeController::class,'UpdateEmployee']);

	// This is EmployeeController.php 
	// concept of mutators
// Route::get('/add-mutators',[EmployeeController::class,'AddMutators']);
        
	// Query builder methods in laravel
// Route::get('builder-query',[EmployeeController::class,'BuilderQuery']);
        
	// Eloquent Relationship in laravel 
// Route::get('eloquent',[EmployeeController::class,'Eloquent']);


	// This is SiteController.php route
Route::get('site',[SiteController::class,'Site']);
Route::get('get-user',[SiteController::class,'getUser']);
Route::get('add-user',[SiteController::class,'addUser']);
Route::get('update-user',[SiteController::class,'updateUser']);
Route::get('delete-user',[SiteController::class,'deleteUser']);

        
        // This is MultiLanguage.php route
Route::get('multi-language',[MultiLanguage::class,'Localization']);
Route::get('change/lang', [MultiLanguage::class, "ChangeLang"])->name('LangChanges');



        // This is ApiController.php route
Route::get('/http-api',[ApiController::class,'index']);


		// Resource controller binding with route
Route::resource('device', DeviceController::class);

 		/* Concept of Local scope of laravel model */
Route::get('get-ActiveStutus',[DeviceController::class,'getActiveStutus']);
Route::get('get-InactiveStatus',[DeviceController::class,'getInactiveStatus']);

		/* Send Email Using Gmail SMTP in laravel */
Route::get('send-mail',[MailController::class,'SendMail']);


		/* How to work with multiple database connection */
Route::get('get-device',[DeviceController::class,'GetDevice']);
Route::get('get-user',[DeviceController::class,'GetUser']);


		/* What are helper and how to use it in laravel. */
Route::get('helper',[DeviceController::class,'Helper']);


Route::get('/', function () {
	/*
		emoveWhiteSpace()
		This function is written app/Helpers.php file
	*/
	// $strings = "My name is AbulQasim";
	// echo removeWhiteSpace($strings);
    	// return view('welcome');
});
       

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';


	// Send Varification Email address
	
		// This is not working, dont send email verification
// Route::get('/email/verify', function () {
// 	return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
// 	$request->fulfill();
   
// 	return redirect('/dashboard');
//   })->middleware(['auth', 'signed'])->name('verification.verify');

 
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

		// E-commerce controller process



	// Login get and post method
Route::get('login', function(){
	return view('ecommerce.login');
});
Route::post('my-login',[UserController::class,'MyLogin'])->name('post.login');
	
	// Register get and post method
Route::get('register',function(){
	return view('ecommerce.register');
});
Route::post('my-register',[UserController::class,'MyRegister'])->name('post.register');

	// if login success then refer product page
Route::get('product',[ProductController::class,'product']);
	// Logout Process
Route::get('logout',function(){
	Session::forget('user');
	return redirect('product');
});

	// Detail route
Route::get('detail/{id}',[ProductController::class,'Details']);
	// Search Route
Route::get('search',[ProductController::class,'Search']);
	// Add to Cart Route
Route::post('addtocart',[ProductController::class,'addToCard']);
	// Show cart list route
Route::get('cartlist',[ProductController::class,'cartList']);
	// Remove Cart Route
Route::get('removecart/{id}',[ProductController::class,'RemoveCart']);
	// Buys Route
Route::get('buysnow/{id}',[ProductController::class,'BuysNow']);
	// Order Replace route 
Route::post('replaceorder',[ProductController::class,'ReplaceOrder']);
	// Myorder route
Route::get('myorder',[ProductController::class,'MyOrder']);
	// Cancil Order route
Route::get('ordercancil/{id}',[ProductController::class,'OrderCancil']);
	// profile route
Route::get('userprofile',[ProductController::class,'UserProfile']);
	//  Edit profile
Route::Post('editprofile',[ProductController::class,'EditProfile']);

Route::get('tinymce',[ProductController::class,'Tinymce']);