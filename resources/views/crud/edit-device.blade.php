@extends('crud.layout')

@section('title','Edit Device')
@section('body')
	<div class="jumbotron  my-2">
		<h3 style="margin-top: -50px;">Update Device</h3><hr>
		<div class="card ">
			<div class="card-header">
				<strong>Update Device</strong>
				<a href="{{ route('device.index') }}" class="btn float-right btn-primary btn-sm">List Devices</a>
			</div>
			<div class="card-body">
				<form action="{{ route('device.update', $device->id) }}" method="post">
					@csrf
					@method("put")
					<div class="form-group">
						<label for="name" style="font-size:17px;">Device Name</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Enter Device name" value="{{ $device->name }}">	
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="status" style="font-size:17px;">Device Status</label>
						<select name="status" id="status" class="form-control">
							<option value="">Select Status</option>
							<option value="1" @if($device->status == 1) selected @endif>Active</option>
							<option value="0" @if($device->status == 0) selected @endif>Inactive</option>
						</select>
						@error('status')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<input type="submit" value="Update" class="btn btn-primary btn-sm" name="add" id="add">
						<a href="{{ route('device.index') }}" class="btn btn-secondary btn-sm">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection