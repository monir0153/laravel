@extends('admin.admin_master')
@section('admin')
<div class="col-lg-8">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{url('contact/update/'.$contact->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">contact email</label>
                    <input type="text" class="form-control" name="email" value="{{$contact->email}}">
                    
                </div>
                <div class="form-group">
                    <label class="form-label">contact phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
                    
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Address</label>
                    <textarea class="form-control" name="address" rows="3">{{$contact->address}}</textarea>
                    
                </div>
                <div class="form-footer pt-4">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection