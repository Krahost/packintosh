<!-- resources/views/booking/payment.blade.php -->
@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")		

{{-- <form action="{{ route('books.processPaymentPage', ['book' => $book->id]) }}" method="get">
  @csrf
  <label for="payment_method">Select Payment Method:</label>
  <select name="payment_method" id="payment_method" required>
      <option value="COD">Manual</option>
      <option value="Bank Transfer">offline MOMO</option>
      <!-- Add other payment options as needed -->
  </select>
  <button type="submit" class="dash-btn-two tran3s me-3">Proceed to Payment</button>
</form> --}}
{{-- Example Blade file: resources/views/payments/checkout.blade.php --}}

{{-- Example Blade file: resources/views/payments/checkout.blade.php --}}
{{-- Your Blade view file --}}

<form id="paymentForm" action="" method="get">
  <label for="payment_method">Select Payment Method:</label>
  <select name="payment_method" id="payment_method" required onchange="updateFormAction()">
      <option value="" disabled selected>Select your option</option>
      <option value="COD">Wallet</option>
      <option value="Bank Transfer">Offline MOMO</option>
      <option value="Paystack">Online Payment</option>
      <!-- Add other payment options as needed -->
  </select>
  <button type="submit" class="dash-btn-two tran3s me-3">Proceed to Payment</button>
</form>

<script>
function updateFormAction() {
    var form = document.getElementById('paymentForm');
    var selectedPaymentMethod = document.getElementById('payment_method').value;
    var bookId = @json($book->id); // Ensure $book->id is available in this Blade view

    if(selectedPaymentMethod === "COD") {
        form.action = "{{ route('manual.payment', ['book' => ':bookId']) }}".replace(':bookId', bookId);
    } else if(selectedPaymentMethod === "Bank Transfer") {
        form.action = "{{ route('offline.payment', ['book' => ':bookId',$book->total_amount]) }}".replace(':bookId', bookId);
    }else if(selectedPaymentMethod === "Paystack") {
        form.action = "{{ route('paystack.payment', ['book' => ':bookId']) }}".replace(':bookId', bookId);
    }
}
</script>


@endsection