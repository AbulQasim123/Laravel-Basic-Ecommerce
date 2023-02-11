@extends('ecommerce.master')
@section('content')
	<div class="container-fluid my-3">
		<h4 class="text-center text-secondary" style="font-style: italic;">"We are gratefull to you."</h4>
		<h3 class="text-primary">Dear {{Session::get('user')['name']}}</h3>
		<h4 style="margin-left:200px">Your Item details</h4><hr>
		<div class="row">
			<div class="col-md-8 offset-md-2" >
				<table class="table table-bordered table-sm">
					@foreach($buysnow as $buynow)
						<tr>
							<th>Name</th>
							<td class="">{{$buynow->pro_name}}</td>
						</tr>
						<tr>
							<th>Title</th>
							<td class="">{{$buynow->pro_title}}</td>
						</tr>
						<tr>
							<th>Discription</th>
							<td class="">{{$buynow->pro_discription}}</td>
						</tr>
						<tr>
							<th>Brand</th>
							<td class="">{{$buynow->pro_brand}}</td>
						</tr>
						<tr>
							<th>Color</th>
							<td class="">{{$buynow->pro_color}}</td>
						</tr>
						<tr>
							<th>Tax</th>
							<td class="">0</td>
						</tr>
						<tr>
							<th>Delivery Charges</th>
							<td class="">40</td>
						</tr>
						<tr>
							<th>Price</th>
							<td class="">{{$buynow->pro_price + 40}}</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="container" style="background-color: #b4d3b2">
				<div class="row">
					<form action="/replaceorder" method="POST" style="margin: 10px; padding:10px; margin-left: 140px;">
					@csrf
					<h4 class="text-center text-info" style="padding: 10px;">Place Your Orders</h4>
						<div class="form-group">
							<label for="custname" class="font-weight-bold">Enter Your Name</label>
							<input type="text" class="form-control" name="custname" id="custname" style="width: 414px;" placeholder="Enter Your Name">
							@if($errors->has('custname'))
								<span class="text-danger" style="font-size:19px">{{ $errors->first('custname') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="custemail" class="font-weight-bold">Enter Your Email</label>
							<input type="text" class="form-control" name="custemail" id="custemail" style="width: 414px;" placeholder="Enter Your Email">
							@if($errors->has('custemail'))
								<span class="text-danger" style="font-size:19px">{{ $errors->first('custemail') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="custmobile" class="font-weight-bold">Enter Mobile Number</label>
							<input type="text" class="form-control" name="custmobile" id="custmobile" style="width: 414px;" placeholder="Enter Mobile">
							@if($errors->has('custmobile'))
								<span class="text-danger" style="font-size:19px">{{ $errors->first('custmobile') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="custaddress" class="font-weight-bold">Enter your Address</label>
							<textarea name="custaddress" id="custaddress" class="form-control" cols="50" placeholder="Enter you Delivery address"></textarea>
							@if($errors->has('custaddress'))
								<span class="text-danger" style="font-size:19px">{{ $errors->first('custaddress') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="custpayment" class="font-weight-bold">Payment Option</label>
							<select name="custpayment" id="custpayment" class="form-control" style="width: 414px;">
								<option value="">Select Payment Method</option>
								<option value="online_pay">Online Payment</option>
								<option value="emi">EMI</option>
								<option value="cash">Cash on Delivery</option>
							</select>
							@if($errors->has('custpayment'))
								<span class="text-danger" style="font-size:19px">{{ $errors->first('custpayment') }}</span>
							@endif
						</div>
						<input type="submit" value="Order Now" class="btn btn-primary btn-sm">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
</body>
</html>