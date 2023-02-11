@extends('crud.layout')

@section('title','Add Device')
@section('body')
	<div class="jumbotron  my-2">
		<h3 style="margin-top: -50px;">Add Device</h3><hr>
		<div class="card ">
			<div class="card-header">
				<strong>Add Device</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('device.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="name" style="font-size:17px;">Device Name</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Enter Device name" value="{{ old('name') }}">
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="status" style="font-size:17px;">Device Status</label>
						<select name="status" id="status" class="form-control">
							<option value="">Select Status</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
						@error('status')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<input type="submit" value="Add" class="btn btn-primary btn-sm" name="add" id="add">
						<a href="{{ route('device.index') }}" class="btn btn-secondary btn-sm">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection