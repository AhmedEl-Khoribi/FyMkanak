@extends('dashboard.master')
@section('content')

<form method="POST" action="/admin/car_store">
    {{ csrf_field() }}
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Create Car</h3>
            </div>
    <div class="form-group">
      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>Car Model name</label>
      <input type="text" class="form-control" name="name" id="inputSuccess">
    </div>
   <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Description
      </h3>
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body pad">
            <textarea id="editor1" name="desc" rows="10" cols="80">
            </textarea>
    </div>
  </div>
<div class="box-footer">
<button type="submit" class="btn btn-primary btn-block btn-flat">Create Car</button>
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