<?php 
?>
@extends('ecommerce.master')
@section('content')
	<div class="container-fluid my-3">
		<h3 align="center" class="text-primary">Your Order List</h3>
		@if(session()->has('ordercancil'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<div style="font-size: 17px;">{{ session()->get('ordercancil') }}</div>
			</div>
		@endif
		<hr>
		<div class="row">
			@foreach($myorders as $myorder)
				<div class="" style="margin: 3px; padding: 0px; width: 300px; height: 300px; background-color: white;text-align: center; box-shadow: 0 3px 4px  rgba(0,0,0,0.5); opacity: 0.9;">
					<div class="col-md-3">
						<a href="detail/{{$myorder->pro_id}}" style="text-decoration: none; color:black">
							<img src="{{ asset('all_products/'. $myorder->pro_img) }}" alt="" height="250px" width="250px;">
						</a>
						<a href="ordercancil/{{$myorder->id}}" style="margin-left:180px;" class="my-3 btn btn-danger btn-sm">Order Cancil</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="my-0 ml-2" style="padding:10px; margin:10px; opacity:0.9">
						<p class="font-weight-bold" style="font-size: 17px;">Name: {{ $myorder->user_name}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">E-mail: {{ $myorder->email}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">Mobile: {{ $myorder->mobile}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">Address: {{ $myorder->address}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">Delivery Status: {{ $myorder->status}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">Payment Method: {{ $myorder->payment_method}}</p>
						<p class="font-weight-bold" style="font-size: 17px;">Payment Status: {{ $myorder->payment_status}}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection

</body>
</html>