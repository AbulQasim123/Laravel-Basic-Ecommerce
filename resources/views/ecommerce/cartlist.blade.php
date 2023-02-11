<?php 
?>
@extends('ecommerce.master')
@section('content')
	<div class="container-fluid my-3">
		<h3 align="center" class="text-primary">Your Cart are here</h3><hr>
		<div class="row">
			@foreach($cartlists as $cartlist)
			<div class="col-md-3">
				<a href="detail/{{$cartlist->pro_id}}" style="text-decoration: none; color:black">
					<div class="" style="margin: 3px; padding: 0px; width: 300px; height: 460px; background-color: white;text-align: center; box-shadow: 0 3px 4px  rgba(0,0,0,0.5); opacity: 0.9;">
						<div>
						<div align="left"><b>Price : Rs {{ $cartlist->pro_price }}</b></div>
							<h3>{{ $cartlist->pro_name }} </h3>
							<b>{{ $cartlist->pro_title }}</b>
						</div>
						<div>
							<img  width="150px" height="150px" src="{{ asset('all_products/'. $cartlist->pro_img) }}" alt="">
						</div>
						<hr style="border: 1px solid #40de00; opacity: 0.6">	
						<div class="detail">
							<div style="color: black; opacity: 0.9"><b>Title : {{$cartlist->pro_title}}</b></div>
							<div style="color: black; opacity: 0.9"><b>Discription : {{$cartlist->pro_discription}}</b></div>
							<div style="color: black; opacity: 0.9"><b>Price Rs : {{$cartlist->pro_price}}</b></div>
							<div style="color: black; opacity: 0.9"><b>Brand : {{$cartlist->pro_brand}}</b></div>
							<div style="color: black; opacity: 0.9"><b>Color : {{$cartlist->pro_color}}</b></div>
							<div>
								<a href="removecart/{{$cartlist->cart_id}}" class="btn btn-danger btn-sm">Remove from Cart</a>
								<a href="buysnow/{{$cartlist->cart_id}}" class="btn btn-info btn-sm">Buy now</a>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
@endsection

</body>
</html>