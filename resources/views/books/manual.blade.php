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


<h1>Payment With Wallet</h1>

@if(!$book->paid)
    <form action="{{ route('books.payWithWallet', ['book' => $book->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <button type="submit" class="dash-btn-two tran3s me-3">Pay with Wallet</button>
    </form>
@endif
@endsection