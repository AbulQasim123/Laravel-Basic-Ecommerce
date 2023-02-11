@extends('ecommerce.master')
@section('content')
		<!-- Crousel section -->
	<div class="custom-product">
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>
			
			<div class="carousel-inner">
			@foreach($products as $product)
				<div class="carousel-item {{ $product['product_id']==1? 'active' : '' }}">
					<img  class="slide-img" src="{{ asset('crousel_image/'. $product['product_image']) }}" alt="Los Angeles">
					<div class="carousel-caption slider-text">
						<h3>{{ $product['product_title'] }}</h3>
						<p>{{ $product['product_discription'] }}</p>
					</div>   
				</div>
			@endforeach
			</div>
			
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>	
	</div>

	<div class="container-fluid my-3">
		<span style="font-size: 25px;">Let's joy our products</span>

		@if($errors->has('search'))
			<div class="alert alert-danger" style="font-size: 20px; width: 500px; margin: 0 auto;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<b>{{$errors->first('search')}}</b>
			</div>
		@endif 
		@if(session()->has('addtocart'))
			<div class="alert alert-success" style="font-size: 20px; width: 600px; margin: 0 auto;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<b>{{ session()->get('addtocart') }}</b>
			</div>
		@endif 
		@if(session()->has('success'))
			<div class="alert alert-success" style="font-size: 20px; width: 600px; margin: 0 auto;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<b>{{ session()->get('success') }}</b>
			</div>
		@endif 
		<hr>
		
		<div class="row">
			@foreach($allproducts as $allproduct)
			<div class="col-md-4">
				<a href="detail/{{$allproduct->pro_id}}" style="text-decoration: none; color:black">
					<div class="trending_img">
						<div>
						<div align="left"><b>Price : Rs {{ $allproduct->pro_price }}</b></div>
							<h3>{{ $allproduct->pro_name }} </h3>
							<b>{{ $allproduct->pro_title }}</b>
						</div>
						<div>
							<img id="lazyload" style="float:center" src="{{ asset('all_products/'. $allproduct->pro_img) }}" alt="">
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>{{ $allproducts->links() }}
	</div>
	
@endsection

</body>
</html>