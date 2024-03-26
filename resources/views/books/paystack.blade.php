@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")		

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>


@endif

<h1>PAYSTACK</h1>
<style>
.wd {
  width: 10rem; /* or 15%, 150px, etc., depending on your requirement */
}
.ww {
  width: 20rem; /* or 15%, 150px, etc., depending on your requirement */
}
</style>
<form method="POST" action="{{ route('pay') }}">
  @csrf

  <div class="dash-input-wrapper mb-25 ww">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required value="{{ Auth::user()->email }}" readonly>
  </div>

  <div class="dash-input-wrapper mb-25 ww">
      <input   name="book_id" value="{{ $book->id }}" readonly>
  </div>

  <div class="dash-input-wrapper mb-30 wd">
      <label for="amount">Amount</label>
      <input type="number" id="amount" name="amount"  value="{{ $book->total_amount }}" readonly>
  </div>

  <button type="submit" class="dash-btn-two tran3s me-3">Pay Now</button>
</form>

@endsection