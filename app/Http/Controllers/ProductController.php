<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\CustomerOrder;
class ProductController extends Controller
{
    public function product(){
		$products =  Product::all();
		$allproducts = DB::table('allproducts')->paginate(12);
		return view('ecommerce.product', [
			"products" => $products,
			"allproducts" => $allproducts,
		]);
    }
	public function Details($id){
		$details =  DB::table('allproducts')->where("pro_id",$id)->get();
		
		return view('ecommerce.details',['details' =>$details]);
	}

	public function Search(Request $request){
		// return $request->input();
		$validate = Validator::make($request->all(),
		[
			'search' => 'required',
		],
		[
			'required' => 'We need your keyword for result processing.',
		])->validate();

		$searchs =  DB::table('allproducts')->where("pro_name", 'like', '%'.$request->input('search').'%')->get();
		return view('ecommerce.search',compact('searchs'));
	}
		// Add to Cart process
	public function addToCard(Request $request){
		// return $request->all();
		if ($request->session()->has('user')) {
			$cart = new Cart();
			$cart->user_id = $request->session()->get('user')['id'];
			$cart->user_name = $request->session()->get('user')['name'];
			$cart->product_id = $request->pro_id;
			$cart->save();
			return redirect('product')->with('addtocart','Your Cart added successfully. Click the Cart link.');
		}else{
			return redirect('login')->with('first_login','Please make sure login first.');
		}
	}
		// Count item in the Add to Cart
	static function CartItem(){
		$userId = Session::get('user')['id'];
		return Cart::where('user_id', $userId)->count();
	}
		// Cartlist
	public function cartList(Request $request){

		if ($request->session()->has('user')) {
			$userId = Session::get('user')['id'];
			$cartlists= DB::table('carts')
					->join('allproducts','carts.product_id', '=', 'allproducts.pro_id')->where('carts.user_id',$userId)
					->select('allproducts.*','carts.id as cart_id')
					->get();
			return view('ecommerce.cartlist',['cartlists' => $cartlists]);
		}else{
			return redirect('login')->with('first_login','Please make sure login first.');
		}
	}


		// Remove cart list method
	public function RemoveCart($id){
		Cart::destroy($id);
		return redirect('cartlist');
	}

	public function BuysNow($id){
		$buysnow = DB::table('carts')->join('allproducts', 'carts.product_id', '=','allproducts.pro_id')->where('carts.id',$id)->select('allproducts.*','carts.user_id as cart_id','carts.user_name as username')->get();
		return view('ecommerce.buynow',[
			'buysnow' => $buysnow
		]);
	}
			// Replace order method
	public function ReplaceOrder(Request $request){
		$validate = Validator::make($request->all(),
			[
				'custname' => 'required',
				'custemail' => 'required|email',
				'custmobile' => 'required',
				'custaddress' => 'required',
				'custpayment' => 'required',
			],
			[
				'custname.required' => 'Your Name is required?',
				'custemail.required' => 'Your Email is required?',
				'custemail.email' => 'Please provide a valid email address!',
				'custmobile.required' => 'Your Mobile Number is required?',
				'custaddress.required' => 'Your Address is required?',
				'custpayment.required' => 'Please select payment option required?',
			])->validate();

		$userId = Session::get('user')['id'];
		$allcarts =  Cart::where('user_id',$userId)->get();
		foreach($allcarts as $allcart){
			$customerorders = new CustomerOrder();
			$customerorders->user_id = $allcart->user_id;
			$customerorders->product_id = $allcart->product_id;
			$customerorders->user_name = $request->custname;
			$customerorders->email = $request->custemail;
			$customerorders->mobile = $request->custmobile;
			$customerorders->payment_status = "Pending";
			$customerorders->status = "Pending";
			$customerorders->payment_method = $request->custpayment;
			$customerorders->address =  $request->custaddress;
			$customerorders->save();
			Cart::where('user_id',$userId)->delete();
			return redirect('product')->with('success','Your Order successfull now, Click the Order link.');
		}
	}

	public function MyOrder(Request $request){

		if ($request->session()->has('user')) {
			$userId = Session::get('user')['id'];
			$myorders = DB::table('customer_orders')->join('allproducts','customer_orders.product_id', '=','allproducts.pro_id')->where('customer_orders.user_id',$userId)->get();
			return view('ecommerce.customer_order', ['myorders' => $myorders]);

		}else{
			return redirect('login')->with('first_login','Please make sure login first.');
		}
		
	}
		// Cancil Order method
	public function OrderCancil($id){
		CustomerOrder::destroy($id);
		return redirect('myorder')->with('ordercancil','Your Order Cancil successfully.');
	}

	public function UserProfile(){
		$userId = Session::get('user')['id'];
		$userprofiles = User::where('id', $userId)->get();
		return view('ecommerce.userprofile', ['userprofiles' => $userprofiles]);
	}

	public function EditProfile(Request $request){
		$validate = Validator::make($request->all(),
				[
					'username' => 'required',
					'useremail' => 'required|email|unique:users,email',
					'usercontact' => 'required',
				],
				[
					'username.required' => 'User Name is required?',
					'useremail.required' => 'User Email is required?',
					'useremail.email' => 'Please provide a valid email Address!',
					'useremail.unique' => 'This email already exist',
					'usercontact.required' => 'User Contact is required?',
				])->validate();
			// return $request->all();
			$userId = Session::get('user')['id'];
			$editprofile= User::find($userId);
			
			$editprofile->name  =  $request->username;
			$editprofile->phone =  $request->usercontact;
			$editprofile->email =  $request->useremail;
			
			$editprofile->save();
			// $editprofile->where('id',$userId)->update($update_data);
			return redirect('userprofile')->with('user_profile', 'Your profile updated successfully.');
	}

	public function Tinymce(){
		return view('ecommerce.tinymce');
	}
}
