@extends('admin.admin_master')
@section('admin')
<div class="col-lg-8">
    <div class="card-header card-header-border-bottom">
        <h2>Basic Form Controls</h2>

        <div class="card-body">
            <form action="{{url('about/update/'.$about->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">About tilte</label>
                    <input type="text" class="form-control" name="title" placeholder="About title" value="{{$about->title}}">
                    
                </div>
                
                <div class="form-group">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_dis" rows="3">{{$about->short_dis}}</textarea>
                    
                </div>
                <div class="form-group">
                    <label class="form-label">Long Description</label>
                    <textarea class="form-control" name="long_dis" rows="3">{{$about->long_dis}}</textarea>
                    
                </div>
               
                <div class="form-footer pt-4">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection