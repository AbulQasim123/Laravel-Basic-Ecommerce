@extends('ecommerce.master')
@if($errors->has('search'))
	<h3>{{$errors->first('search')}}</h3>
@endif
@section('content')
	<div class="container-fluid my-3">
		<h3>Results for Search</h3><hr>
		<div class="row">
			@if($searchs)
			@foreach($searchs as $search)
			<div class="col-md-4">
				<a href="detail/{{$search->pro_id}}" style="text-decoration: none; color:black">
					<div class="trending_img">
						<div>
						<div align="left"><b>Price : Rs {{ $search->pro_price }}</b></div>
							<h3>{{ $search->pro_name }} </h3>
							<b>{{ $search->pro_title }}</b>
						</div>
						<div>
							<img style="float:center" src="{{ asset('all_products/'. $search->pro_img) }}" alt="">
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@else
				<h3></h3>
			@endif
		</div>
	</div>
	
@endsection

</body>
</html>