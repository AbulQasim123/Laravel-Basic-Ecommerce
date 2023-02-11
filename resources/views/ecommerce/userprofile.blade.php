@extends('ecommerce.master')
@section('content')
	<div class="container-fluid">
		<h3 align="center" class="text-primary">Profile</h3><hr>
		@if(session()->has('user_profile'))
			<div class="alert alert-success">
				{{ session()->get('user_profile') }}
			</div>
		@endif
		<div class="row">
			<div class="col-md-6" style="height: 500px;;">
				@foreach($userprofiles as $userprofile)
					<div class="jumbotron my-3 text-center" style="background-color: #ddeeff; border-radius: 20px; border: 1px solid black">
						<h2>User Name: {{$userprofile->name}}</h2>
						<h4>User Email: {{$userprofile->email}}</h4>
						<h4>User Contact: {{$userprofile->phone}}</h4>
					</div>
				@endforeach
			</div>
			<div class="col-md-6">
				<div class="" style="background-color: #ddeeff; border-radius: 20px; border: 1px solid black; margin:18px; padding:20px">
					<form action="/editprofile" method="POST">
						@csrf
						<div class="form-group">
							<label for="username">User Name</label>
							<input type="text" class="form-control" name="username" id="username" class="form-control" value="{{ $userprofile->name }}">
							@if($errors->has('username'))
								<span class="text-danger" style="font-size: 19px;">
									{{ $errors->first('username') }}
								</span>
							@endif
						</div>
						<div class="form-group">
							<label for="useremail">User Email</label>
							<input type="text" class="form-control" name="useremail" id="useremail" class="form-control" value="{{ $userprofile->email }}">
							@if($errors->has('useremail'))
								<span class="text-danger" style="font-size: 19px;">
									{{ $errors->first('useremail') }}
								</span>
							@endif
						</div>
						<div class="form-group">
							<label for="usercontact">User Contact</label>
							<input type="text" class="form-control" name="usercontact" id="usercontact" class="form-control"  value="{{ $userprofile->phone }}">
							@if($errors->has('usercontact'))
								<span class="text-danger" style="font-size: 19px;">
									{{ $errors->first('usercontact') }}
								</span>
							@endif
						</div>
						<input type="submit" value="Edit" id="edit" class="btn btn-primary btn-sm">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection