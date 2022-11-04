@extends('admin.admin_master')
@section('admin')
<div class="col-md-8 m-auto">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create About</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.about')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">About tilte</label>
                    <input type="text" class="form-control" name="title" placeholder="Slider title">
                    
                </div>
                
                <div class="form-group">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_dis" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Long Description</label>
                    <textarea class="form-control" name="long_dis" rows="3"></textarea>
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection