@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")




<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h2>Name: {{ $book->user->name }}</h2>
            <p>Date of Pick Up: {{$book->pickup}}</p>
            <p>Date of Return: {{$book->return}}</p>
            <p>Address: {{$book->address}}</p>
            <p>Address: {{$book->location_address}}</p>
            <p>Payment: {{$book->payment}}</p>
            <p>Status: {{$book->Status}}</p>
          </div>
          <div class="col-4 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button type="button" class="btn btn-primary btn-icon-text">
                <i class="ti-file btn-icon-prepend"></i>
                Submit
              </button>
              <button  class="btn-inverse-warning">Edit</button>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->


@endsection