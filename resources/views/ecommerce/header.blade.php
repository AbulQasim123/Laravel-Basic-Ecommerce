<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
$total = 0;
if (Session::has('user')) {
	$total = ProductController::CartItem();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="product">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding: 5px; margin-left:175px;">
    <ul class="navbar-nav mr-auto">
		<li class="nav-item active"><a class="nav-link" href="myorder">Order</a></li>
		<li class="nav-item active"><a class="nav-link" href="#">About</a></li>
		<form action="search" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" name="search" style="border: 1px solid orange; width: 500px;" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<li class="nav-item active"><a class="nav-link" href="cartlist">Cart ( {{$total}} )</a></li>
		@if(Session::has('user'))
      	<li class="nav-item dropdown" style="margin-left: 80px">
        		<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{ Session::get('user')['name'] }}
       		</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="userprofile">Profile</a>
				<a class="dropdown-item" href="/logout">Logout</a>
			</div>
      	</li>
		@else
			<li class="nav-item active"><a class="nav-link" href="/login">Login</a></li>
			<li class="nav-item active"><a class="nav-link" href="register">Register</a></li>
		@endif
    </ul>
    
  </div>
</nav>