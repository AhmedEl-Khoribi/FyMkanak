@extends('dashboard.master')
@section('content')

<form method="POST" action="/admin/updateSiteInfo/{{ $info->id }}"  enctype="multipart/form-data">
 {{ csrf_field() }}
  <input type="hidden" name="_method" value="PATCH">
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Site Settings</h3>
            </div>
 <div class="form-group has-success">
   <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Site Name</label>
   <input type="text" class="form-control" name="site_name" id="inputSuccess" value="{{ $info->site_name }}">
   <span class="help-block">Must Choose Special &amp; Unique Site Name</span>
 </div>
  <div class="form-group has-danger">
    <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Site Keywords</label>
    <input type="text" class="form-control" name="keywords" id="inputSuccess" value="{{ $info->keywords }}">
    <span class="help-block">Must be Separated by a Comma</span>
  </div>
 <div class="form-group has-error">
    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Site Author</label>
    <input name="author" type="text" class="form-control" id="inputError" value="{{ $info->author }}">
  </div>
  <div class="form_group">
    <label>Site Description</label>
    <input name="description" class="form-control input-lg" type="text" value="{{ $info->description }}">
        <span class="help-block">Helps in Google Search results</span>
  </div>
  <hr>
  <div class="row">
      <div class="col-xs-4">  
        <h5>Old Site Logo</h5>
      <img src="/uploads/{{ $info->logo }}" width="215">
      </div>
      <div class="col-xs-8">  
        <label>Upload new site logo</label>
        <input type="file" name="logo" class="form-control">
      </div>
  </div>
  <hr>
  <div class="row">
      <div class="col-xs-4">  
        <h5>Old Site Fivicon</h5>
      <img src="/uploads/{{ $info->favicon }}" width="215">
      </div>
      <div class="col-xs-8">  
        <label>Upload new site Fivicon</label>
        <input type="file" name="favicon" class="form-control">
      </div>
  </div>
  <hr>
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Company Desc in English
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
            <textarea id="editor2" name="about_company" rows="10" cols="80">{{ $info->about_company }}
            </textarea>
    </div>
  </div>
  <hr>
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Company Desc in Arabic
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
            <textarea id="editor2" name="about_company_ar" rows="10" cols="80">{{ $info->about_company_ar }}
            </textarea>
    </div>
  </div>
  <div class="form_group">
    <label>Video in Homepage Link</label>
    <input name="video_link" class="form-control input-lg" type="text" value="{{ $info->video_link }}">
        <span class="help-block">Must be from any video site...</span>
  </div>
  <hr>
  <div class="row">
    <div class="col-xs-4">  
        <label>Facebook Acc.</label>
        <input name="fb_link" type="text" class="form-control" value="{{ $info->fb_link }}">
      </div>
      <div class="col-xs-4">  
        <label>Twitter Account</label>
        <input name="twitter_link" type="text" class="form-control" value="{{ $info->twitter_link }}">
      </div>
      <div class="col-xs-4">  
        <label>Google+ Account</label>
        <input name="google_plus" type="text" class="form-control" value="{{ $info->google_plus }}">
      </div>
  </div>
  <div class="row">
      <div class="col-xs-4">  
        <label>LinkedIn Acc.</label>
        <input name="linkedin_link" type="text" class="form-control" value="{{ $info->linkedin_link }}">
      </div>
      <div class="col-xs-4">  
        <label>Youtube Acc.</label>
          <input name="youtube_link" type="text" class="form-control" value="{{ $info->youtube_link }}">
      </div>
      <div class="col-xs-4">  
        <label>Instagram Acc.</label>
        <input name="instagram_link" type="text" class="form-control" value="{{ $info->instagram_link }}">
      </div>
  </div>
<div class="box-footer">
<button type="submit" class="btn btn-success btn-block btn-flat">Edit Site's Settings</button>
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