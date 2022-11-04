
@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                <div class="form-group mb-3">
                                    <label class="form-label">Update Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" value="{{$brands->brand_name}}">
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Update Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Existing image </label>
                                    <div><img src="{{asset($brands->brand_image)}}" width="170px" height="130px"></div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>

		{{-- Trash part --}}
		
    </div>
@endsection