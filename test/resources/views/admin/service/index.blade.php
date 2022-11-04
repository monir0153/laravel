
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
				<h2>Home Service</h2>
				<a href="{{route('add.service')}}"> <button class="btn btn-primary mb-3"> Add service</button></a>
				<div class="col-md-12">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <b>{{session('success')}}</b>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
									<th scope="col" width="5%">SL</th>
									<th scope="col" width="15%">About title</th>
									<th scope="col" width="20%">Discription</th>
									<th scope="col" width="15%">Action</th>
									
									</tr>
								</thead>
								<tbody>
										@php ($i = 1)
										@foreach($services as $service)
									<tr>
									<th scope="row">{{ $i++}}</th>
									<td>{{$service->title}}</td>
									<td>{{$service->description}}</td>
									<td>
										<a href="{{url('service/edit/'.$service->id)}}" class="btn btn-success">Edit</a>
										<a href="{{url('service/delete/'.$service->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
									</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
				
				</div>
			</div>
		</div>

@endsection