
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
				<h2>Home About</h2>
				<a href="{{route('add.about')}}"> <button class="btn btn-primary mb-3"> Add About</button></a>
				<div class="col-md-12">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{session('success')}}</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card-header">All About </div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
									<th scope="col" width="5%">SL</th>
									<th scope="col" width="15%">About title</th>
									<th scope="col" width="20%">short discription</th>
									<th scope="col" width="20%">Long discription</th>
									<th scope="col" width="15%">Action</th>
									
									</tr>
								</thead>
								<tbody>
										@php ($i = 1)
										@foreach($about as $data)
									<tr>
									<th scope="row">{{ $i++}}</th>
									<td>{{$data->title}}</td>
									<td>{{$data->short_dis}}</td>
									<td>{{$data->long_dis}}</td>
									<td>
										<a href="{{url('about/edit/'.$data->id)}}" class="btn btn-success">Edit</a>
										<a href="{{url('about/delete/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
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

		{{-- Trash part --}}
		
    
@endsection