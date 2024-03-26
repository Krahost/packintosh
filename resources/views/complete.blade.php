<h2>Payment Completed</h2>

<p>Thank you for your booking!</p>
<p>Name: {{ $booking->name }}</p>
<p>School: {{ $booking->school }}</p>
<p>Payment Method: {{ $booking->payment_method }}</p>
<p>Status: {{ $booking->status }}</p>

<a href="{{ route('booking.create') }}">Make Another Booking</a>