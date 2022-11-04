
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
				<h2>Home Slider</h2>
				<a href="{{route('add.slider')}}"> <button class="btn btn-primary mb-3"> Add Slider</button></a>
				<div class="col-md-12">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{session('success')}}</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card-header">All Slider </div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
									<th scope="col" width="5%">SL</th>
									<th scope="col" width="15%">Slider title</th>
									<th scope="col" width="25%">Slider details</th>
									<th scope="col" width="15%">Slider Image</th>
									<th scope="col" width="15%">Action</th>
									
									</tr>
								</thead>
								<tbody>
										@php ($i = 1)
										@foreach($sliders as $slider)
									<tr>
									<th scope="row">{{ $i++}}</th>
									<td>{{$slider->title}}</td>
									<td>{{$slider->description}}</td>
									<td ><img src="{{asset($slider->image)}}" class="m-auto" alt="" width="120px" height="80px"></td>
									<td>
										<a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-success">Edit</a>
										<a href="{{url('slider/delete/'.$slider->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
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