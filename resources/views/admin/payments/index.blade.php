@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")




<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <p>Wallet Transactions</p>
            <table class="table">
              <thead>
                  <tr>
                      <th>Type</th>
                      <th>User</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($transactions as $transaction)
                      <tr>
                          <td>{{ $transaction->type }}</td>
                          <td>{{ $transaction->wallet->user->name }}</td> {{-- Adjust based on your User model --}}
                          <td>{{ number_format($transaction->amount, 2) }}</td>
                          <td>{{ $transaction->description }}</td>
                          <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="d-flex">
        {{ $transactions->links() }}
      </diV>

            {{-- <h2>Name: {{ $book->user->name }}</h2>
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
              <button type="button" class="">Save</button>
               <button type="button" class="">Edit</button>
              </div>
            </div>
           </div>
          </div> --}}
        </div>
      </div>
    </div>
    
    
    
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->


@endsection