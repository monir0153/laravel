@extends('admin.admin_master')
@section('admin')
<div class="col-lg-8">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.slider')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Slider tilte</label>
                    <input type="text" class="form-control" name="title" placeholder="Slider title">
                    
                </div>
                
                <div class="form-group">
                    <label class="form-label">Slider Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Slider Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection