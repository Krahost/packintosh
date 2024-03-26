
@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <div class="container">
              <h2>Edit User</h2>
              <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
            
            
                  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $user->name }}" required>
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                </div>
        
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone }}" required>
                </div>
        
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" name="bio" id="bio">{{ $user->bio }}</textarea>
                </div>
                <div class="form-group">
                  <label for="password">New Password (optional)</label>
                  <input type="password" class="form-control" name="password" id="password">
              </div>
              
              <div class="form-group">
                  <label for="password_confirmation">Confirm New Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
              </div>
        
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
            
              
            </div>
            <a  type="button" class="btn btn-inverse-danger btn-fw mt-1" href="{{ route('admin/users.index',  $user->id) }}" class="btn btn-secondary">Cancel</a>
             
            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>

  @endsection