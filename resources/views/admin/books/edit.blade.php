
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
              <h2>Edit Booking</h2>
            
              <form method="POST" action="{{ route('books.update', $book->id) }}">
                  @csrf
                  @method('PUT')
            
            
                  <div class="form-group">
                      <label>Package (GHC)</label>
                      <input type="text" name="total_amount" class="form-control" value="{{ $book->total_amount }}" required>
                  </div>
            
                  <div class="form-group">
                      <label>Date of Pick Up</label>
                      <input type="date" name="pickup" class="form-control" value="{{ $book->pickup }}" required>
                  </div>
            
                  <div class="form-group">
                      <label>Date of Return</label>
                      <input type="date" name="return" class="form-control" value="{{ $book->return }}" required>
                  </div> 
            
                  <button type="submit" class="btn btn-primary">Update Booking</button>
              </form>
            </div>
            <a  type="button" class="btn btn-inverse-danger btn-fw mt-1" href="{{ route('books.view',  $book->id) }}" class="btn btn-secondary">Cancel</a>
             
            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>

  @endsection