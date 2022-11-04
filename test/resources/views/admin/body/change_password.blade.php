@extends('admin.admin_master')
@section('admin')
<div class="col-md-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h2>Password setting</h2>
        </div>
        <div class="card-body">
            <form action="{{route('update.password')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="oldpassword" placeholder="Current password">
                    @error('oldpassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="new password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>

@endsection