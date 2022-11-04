@extends('admin.admin_master')
@section('admin')
<div class="col-md-8 m-auto">
    <div class="card">
       
        <div class="card-header">
            <h2>User profile Update</h2>
        </div>
        <div class="card-body">
            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" id="" name="name" value="{{$user->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">User Email</label>
                    <input type="text" class="form-control" id="" name="email"  value="{{$user->email}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                
            </form>
        </div>
    </div>
</div>

@endsection