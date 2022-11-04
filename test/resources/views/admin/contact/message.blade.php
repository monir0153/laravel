
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
					<h2 class="text-dark">Message</h2>
					
				<div class="col-md-12">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{session('success')}}</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card-body">All Message data </div>
						<div class="table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
									<th scope="col" width="5%">SL</th>
									<th scope="col" width="15%">Name</th>
									<th scope="col" width="15%">Email</th>
									<th scope="col" width="20%">Subject</th>
									<th scope="col" width="20%">message</th>
									<th scope="col" width="15%">Action</th>
									
									</tr>
								</thead>
								<tbody>
										@php ($i = 1)
										@foreach($messages as $msg)
									<tr>
									<th scope="row">{{ $i++}}</th>
									<td>{{$msg->name}}</td>
									<td>{{$msg->email}}</td>
									<td>{{$msg->subject}}</td>
									<td>{{$msg->message}}</td>
									<td>
										<a href="{{url('message/delete/'.$msg->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
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