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
  <h3 class="box-title">Data Table For Cars</h3>
</div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Car Name</th>
          <th>Car Desc</th>
          <th>Car Status</th>
          <th>Edit / Delete</th>
        </tr>
        </thead>
        <tbody>
@foreach($cars as $car)
        <tr>
          <td>{{ $car->id }}</td>
          <td>{{ $car->name }}</td>
          <td><?= $car->desc ?></td>
          <td>{{ $car->status }}</td>
          <td>
            <a href="/admin/car_edit/{{ $car->id }}" class="btn btn-app">
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