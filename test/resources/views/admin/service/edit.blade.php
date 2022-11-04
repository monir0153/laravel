@extends('admin.admin_master')
@section('admin')
<div class="col-md-8 m-auto">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit service</h2>
        </div>
        <div class="card-body">
            <form action="{{url('service/update/'.$service->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">service tilte</label>
                    <input type="text" class="form-control" name="title" placeholder="service title" value="{{$service->title}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{$service->description}}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
