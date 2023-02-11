@extends('crud.layout')

@section('title','List Device')
@section('body')
	<div class="jumbotron  my-2">
		<h3 style="margin-top: -50px;">List Device</h3><hr>
		<div class="card ">
			<div class="card-header">
				<strong>List Device</strong>
				<a href="{{ route('device.create') }}" class="btn btn-secondary btn-sm float-right">Add Device</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-sm">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Status</th>
							<th>Create Date</th>
							<th>Update Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($devices as $value => $device)
						<tr>
							<td>{{ $device->id }}</td>
							<td>{{ $device->name}}</td>
							<td>
								@if($device->status == 1)
									<button type="button" class="btn btn-success btn-sm">Active</button>
								@else($device->status == 0)
									<button type="button" class="btn btn-danger btn-sm">UnActive</button>
								@endif
							</td>
							<td>{{$device->created_at}}</td>
							<td>{{$device->updated_at}}</td>
							<td>
								<a href="{{ route('device.edit', $device->id) }}" class="btn btn-info btn-sm">Edit</a>
								<button href="#" onclick="if(confirm('Are you sure want to delete?')) {
									$('#form-delete-data-{{ $device->id }}').submit();
									}" id="delete" class="btn btn-danger btn-sm">Delete
								</button>
							</td>
							<form action="{{ route('device.destroy', $device->id) }}" id="form-delete-data-{{$device->id}}" method="post">
								@csrf
								@method("delete")
							</form>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection