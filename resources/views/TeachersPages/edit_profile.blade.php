
@extends('TeachersPages.profile_layout')
@section('profile_content')

<?php

      if(Auth::user()){
          Session::put('short_name', Auth::user()->short_name);
      }

      $user_data = DB::table('teacher_tbl')
            -> where('short_name', Auth::user()->short_name)
            ->first();
      //dd($user_data);

 ?>

<br>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>

          <input type="file" class="form-control">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name" value="{{ $user_data->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Designation</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control" name="designation">
                  <option value="Professor">Professor</option>
                  <option value="Associate Professor">Associate Professor</option>
                  <option value="Assistant Professor">Assistant Professor</option>
                  <option value="Lecturer">Lecturer</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Contact No :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user_data->email }}">
            </div>
          </div>

          <a href="{{ url('#') }}" class="btn btn-info">Update</a>

        </form>
      </div>
  </div>
</div>
<hr>

@endsection
