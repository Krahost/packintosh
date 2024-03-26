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
    <table>
        <tbody>
          <tr><td>Status:</td><td>{{$paymentDetails['status']}}</td></tr>
          <tr><td>Reference: </td><td> {{$paymentDetails['reference']}}</td></tr>
          <h1>PAID</h1>
        </tbody>
    </table>

    <div><a href="{{ route('wallet.index') }}"  class="dash-btn-two tran3s me-3">Balance</a></div>
  
    @endsection