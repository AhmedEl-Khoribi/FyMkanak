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
  <h3 class="box-title">Data Table For Site Information</h3>
</div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Site Name</th>
          <th>Logo</th>
          <th>Favicon</th>
          <th>Keywords</th>
          <th>Site Author</th>
          <th>Site Description</th>
          <th>About Company English</th>
          <th>About Company Arabic</th>
          <th>Video Link</th>
          <th>Social Accounts</th>
          <th>Edit / Delete</th>
        </tr>
        </thead>
        <tbody>
@foreach($infos as $info)
        <tr>
          <td>{{ $info->id }}</td>
          <td>{{ $info->site_name }}</td>
          <td><img src="/uploads/{{ $info->logo }}" width="70"></td>
          <td><img src="/uploads/{{ $info->favicon }}" width="90"></td>
          <td>{{ $info->keywords }}</td>
          <td>{{ $info->author }}</td>
          <td>{{ $info->description }}</td>
          <td>{{ $info->about_company }}</td>
          <td>{{ $info->about_company_ar }}</td>
          <td>{{ $info->video_link }}</td>
          <td>
              <a href="{{ $info->fb_link }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
              <br>
              <a href="{{ $info->twitter_link }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
              <br>
              <a href="{{ $info->google_plus }}" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
              <br>
              <a href="{{ $info->youtube_link }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-youtube"></i></a>
              <br>
              <a href="{{ $info->linkedin_link }}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
              <br>
              <a href="{{ $info->instagram_link }}" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
          </td>
          <td>
            <a href="/admin/edit_info/{{ $info->id }}" class="btn btn-app">
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