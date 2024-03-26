@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")	

<h2 class="main-title">Reserve a place</h2>

				<div class="bg-white card-box border-20">

<p>Booking ID:  {{ $book->id }}</p>
<p>Name:  {{ $book->institution }}</p>
<p>School: {{ $book->hostel }}</p>
<p>Amount: {{ $book->total_amount }}</p>
<p>Payment Method: manual/Offline{{ $book->payment_method }}</p>

@if ($book->payment_method === 'COD')
    <p>Cash on Delivery. No further action is required.</p>
@elseif ($book->payment_method === 'Paystack')
    <p>Please make the payment to the following bank account:</p>
    <p>Bank Name: {{ $book->bank_name }}</p>
    <p>Account Number: {{ $book->account_number }}</p>
    <p>Account Name: {{ $book->account_name }}</p>
    <p>After making the payment, please wait for confirmation.</p>
@else
    <form action="{{ route('complete',['book' => $book->id]) }}" method="get">
        @csrf
        <!-- Add your actual payment gateway fields here -->
        <!-- For simplicity, let's assume a button to simulate completing the payment -->
        <button type="submit" class="dash-btn-two tran3s me-3">Complete Payment</button>
    </form>
@endif
</div>
</div>
@endsection