
@extends('admin.admin_master')
@section('admin')


		<div class="container" style="margin-top: 2em;">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{session('success')}}</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card-header">All Brand </div>
						<table class="table table-striped text-center">
						  <thead>
							<tr>
							  <th scope="col">SL</th>
							  <th scope="col">Brand Name</th>
							  <th scope="col">Brand Image</th>
							  <th scope="col">Created at</th>
							  <th scope="col">Action</th>
							  
							</tr>
						  </thead>
						  <tbody>
								{{-- @php ($sl = 1) --}}
								@foreach($brands as $brand)
							<tr>
							  <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
							  <td>{{$brand->brand_name}}</td>
							  {{-- Eloquent ORM join database relation --}}
							  <td ><img src="{{asset($brand->brand_image)}}" class="m-auto" alt="" width="80px" height="50px"></td>
							  {{-- Query builder join database relation --}}
							  {{-- <td>{{$brand->name}}</td> --}}
							  
							  <td>
								@if($brand->created_at == NULL )
							  	<span class="text-danger">No date set</span>
								@else
								  {{$brand->created_at->diffForHumans()}}
								@endif
							</td>
							  
							  <td>
								<a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-success">Edit</a>
								<a href="{{url('brand/delete/'.$brand->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete')">Delete</a>
                              </td>
							</tr>
							
							@endforeach
						  </tbody>
						</table>
						{{$brands->links()}}
					</div>
				</div>
				<div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add brand</div>
                        <div class="card-body">
                            <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control">
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>

		{{-- Trash part --}}
		
    
@endsection