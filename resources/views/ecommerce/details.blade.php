@extends('ecommerce.master')
@section('content')
<br>
    <div class="container" style="height: 550px; padding: 80px;">
		<div class="row">
			@foreach($details as $detail)
			<div class="col-sm-6">
				<img src="{{ asset('all_products/'. $detail->pro_img) }}" alt="" height="300px" style="rotate: -45deg;">
				<div style="border-right: 2px solid black;"></div>
			</div>
			<div class="col-sm-6" >
				<a href="http://127.0.0.1:8000/product" class="btn btn-primary my-3">Go Back</a>
				<h3>Name:- {{$detail->pro_name}}</h3>
				<p style="color: blue; opacity: 0.6"><b>Title : {{$detail->pro_title}}</b></p>
				<p style="color: blue; opacity: 0.6"><b>Discription : {{$detail->pro_discription}}</b></p>
				<p style="color: blue; opacity: 0.6"><b>Price Rs : {{$detail->pro_price}}</b></p>
				<p style="color: blue; opacity: 0.6"><b>Brand : {{$detail->pro_brand}}</b></p>
				<p style="color: blue; opacity: 0.6"><b>Color : {{$detail->pro_color}}</b></p>
				
				<form action="/addtocart" method="post">
					@csrf
					<input type="hidden" name="pro_id" value="{{$detail->pro_id}}">
					<button type="submit" class="btn btn-primary">Add to Cart</button>
				</form>
			</div>
			@endforeach
		</div>
	</div>
@endsection