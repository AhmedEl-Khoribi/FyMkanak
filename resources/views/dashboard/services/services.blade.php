@extends('dashboard.master')
@section('content')
@if($flash = session('message'))
<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <b>{{ $flash }}</b>
</div>
@endif
@if($flash = session('deleted'))
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <b>{{ $flash }}</b>
</div>
@endif

<div class="box">
            <div class="box-header">
  <h3 class="box-title">Data Table For Services</h3>
</div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Service Name</th>
          <th>Service Desc</th>
          <th>Service Price</th>
          <th>Edit / Delete</th>
        </tr>
        </thead>
        <tbody>
@foreach($services as $service)
        <tr>
          <td>{{ $service->id }}</td>
          <td>{{ $service->name }}</td>
          <td>{{ $service->desc }}</td>
          <td>{{ $service->price }}</td>
          <td>
            <a href="/admin/service_edit/{{ $service->id }}" class="btn btn-app">
                 <i class="fa fa-edit"></i> Edit
            </a>
          </td>
        </tr>
@endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection