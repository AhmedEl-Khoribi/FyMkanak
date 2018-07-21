@extends('dashboard.master')
@section('content')

<form method="POST" action="/admin/user_update/{{ $user->id }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
  <input type="hidden" name="_method" value="PATCH">
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User Information</h3>
            </div>
    <div class="form-group">
      <label class="control-label" for="inputSuccess"><i class="fa fa-user"></i> First Name</label>
      <input type="text" class="form-control" name="first_name" id="inputSuccess" value="{{ $user->first_name }}">
    </div>
    <div class="form-group">
      <label class="control-label" for="inputSuccess"><i class="fa fa-user"></i> Last Name</label>
      <input type="text" class="form-control" name="last_name" id="inputSuccess" value="{{ $user->last_name }}">
    </div>
     <div class="form-group">
      <label class="control-label" for="inputSuccess"><i class="fa fa-at"></i> Email</label>
      <input type="text" class="form-control" name="email" id="inputSuccess" value="{{ $user->email }}">
    </div>
     <div class="form-group">
      <label class="control-label" for="inputSuccess"><i class="fa fa-phone"></i> Phone</label>
      <input type="text" class="form-control" name="phone" id="inputSuccess" value="{{ $user->phone }}">
    </div>
<div class="box-footer">
<button type="submit" class="btn btn-success btn-block btn-flat">Edit User</button>
</div>
</form>
@if(count($errors))
<div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
@endsection