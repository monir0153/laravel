
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
				<div class="d-flex justify-content-between">
					<h2 class="text-dark">Contact Profile</h2>
					<a href="{{route('add.contact')}}"> <button class="btn btn-primary mb-3"> Add Contact</button></a>
				</div>
				<div class="col-md-12">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{session('success')}}</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card-body">All Contact data </div>
						<div class="table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
									<th scope="col" width="5%">SL</th>
									<th scope="col" width="25%">Contact address</th>
									<th scope="col" width="20%">Contact Email</th>
									<th scope="col" width="20%">Contact Phone</th>
									<th scope="col" width="15%">Action</th>
									
									</tr>
								</thead>
								<tbody>
										@php ($i = 1)
										@foreach($contacts as $con)
									<tr>
									<th scope="row">{{ $i++}}</th>
									<td>{{$con->address}}</td>
									<td>{{$con->email}}</td>
									<td>{{$con->phone}}</td>
									<td>
										<a href="{{url('contact/edit/'.$con->id)}}" class="btn btn-success">Edit</a>
										<a href="{{url('contact/delete/'.$con->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
									</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection