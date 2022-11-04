@extends('admin.admin_master')
@section('admin')
<div class="col-md-8 m-auto">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.contact')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">contact email</label>
                    <input type="text" class="form-control" name="email">
                    
                </div>
                <div class="form-group">
                    <label class="form-label">contact phone</label>
                    <input type="text" class="form-control" name="phone">
                    
                </div>
                
                <div class="form-group">
                    <label class="form-label">Contact address</label>
                    <textarea class="form-control" name="address" rows="3"></textarea>
                </div>
                
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection