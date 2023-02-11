<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	// E-commerce controller process

	public function MyLogin(Request $request){
		// $users =  Login::all();
		// foreach($users as $user){
		//     echo "<pre>";
		//         echo $user;
		//     echo "</pre>";
		// }
		$validate = Validator::make($request->all(),
		[
			'login_email' => 'required',
			'login_password' => 'required',
		],
		[
			'login_email.required' => 'Email is required?',
			'login_email.email' => 'Please provide Valid Email.',
			'login_password.required' => 'Password is required?',
		])->validate();
		
		$user = User::where(['email' => $request->login_email])->first();
		// echo $user;
		if ($user) {
			if (!$user || Hash::check($request->login_password, $user->password)) {
				$request->session()->put('user', $user);
				return redirect('product')->with('log_success','You have successfully LoggedIn.');
			}else{
				return redirect('login')->with('error','Password Incorrect');
			}
		}else{
			return redirect('login')->with('error','Email Not Register');
		}
	}

	public function MyRegister(Request $request){
		// return $request->all();
			// Query builder method
		// DB::table('logins')->insert([
		//     'name' => $request->create_name,
		//     'phone' => $request->create_phone,
		//     'email' => $request->create_email,
		//     'password' => Hash::make($request->create_password),
		// ]);

		$validate = Validator::make($request->all(),
		[
			'create_name' => 'required',
			'create_phone' => 'required',
			'create_email' => 'required|email|unique:users,email',
			'create_password' => 'required',
		],
		[
			'create_name.required' => 'Name Must be Needed?',
			'create_phone.required' => 'Phone number is required?',
			'create_email.required' => 'Email is required?',
			'create_email.email' => 'Please proided Valid Email!',
			'create_email.unique' => 'The Email has been already taken.',
			'create_password.required' => 'Password is required?',
		])->validate();

		$users = new User(); // This is object of Login Model
		$users->name = $request->create_name;
		$users->phone = $request->create_phone;
		$users->email = $request->create_email;
		$users->password = Hash::make($request->create_password);
		$users->save();
		return redirect('login')->with('success','You have successfully Register ' ."$users->name". ' Please Login');
		// session()->flash('success', 'You have successfully Registe. Please login');
		// return redirect('home');
	}
}
