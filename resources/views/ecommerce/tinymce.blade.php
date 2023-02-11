@extends('ecommerce.master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card my-3" style="height: 600px;">
					<div class="card-header">
						<h4 class="card-title">TinyMCE Editor</h4>
					</div>
					<div class="card-body">
						<form action="">
							@csrf
							<textarea id="tinyeditor" name="" id="" cols="30" rows="10" class="form-control"></textarea><br>
							<button type="button" class="btn btn-primary btn-sm">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection