@extends('dashboard.master')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
										<h2><i class="fa fa-users"></i> Users & Roles</h2>
										<hr>
@if($flash = session('message'))
	<div class="alert alert-warning" role="alert">
		<b>{{ $flash }}</b>
	</div>	
@endif
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<table class="table table-hover">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile No.</th>
		<th>Created At</th>
		<th>User</th>
		<th>Editor</th>
		<th>Admin</th>
	</tr>
	@foreach($users as $user)
	<form method="POST" action="/add-roles">
		{{ csrf_field() }}
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->first_name }} {{ $user->last_name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->phone }}</td>
		<td>{{ $user->created_at->toFormattedDateString() }}</td>
		<td>
			<input type="hidden" name="email" value="{{ $user->email }}">
			<input type="checkbox" name="role_user" onchange="this.form.submit()" {{ $user->hasRole('user')?'checked': ' ' }}>
		</td>
		<td>
			<input type="checkbox" name="role_editor" onchange="this.form.submit()" {{ $user->hasRole('editor')?'checked': ' ' }}>
		</td>
		<td>
			<input type="checkbox" name="role_admin" onchange="this.form.submit()" {{ $user->hasRole('admin')?'checked': ' ' }}>
		</td>
	</tr>
	</form>
	@endforeach
</table>
</div>
</main>

@endsection