@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")		
<h2 class="main-title">Payment Completed</h2>

				<div class="bg-white card-box border-20">
  <h2></h2>
  <h6>
<p>Thank you for your booking!</p>
<p>Booking ID: {{ $book->id }}</p>
<p>Name: {{ $book->institution }}</p>
<p>School: {{ $book->hostel }}</p>
<p>Amount  : GHC{{ $book->total_amount }}</p>
<p>Payment  : {{ $book->payment }}</p>
<p>Status: {{ $book->Status }}</p>

We will call you and arrange for pick </h6>

<a class="dash-btn-two tran3s me-3" href="{{ route('book.create') }}">Make Another Booking</a>
        </div>
      </div>
@endsection