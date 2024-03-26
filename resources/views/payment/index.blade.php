<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <!-- Your head content goes here -->
</head>
<body>

    <div>
        <h2>Payment Details</h2>
       
        <p>Institution: {{ $institution }}</p>
        <p>Duration: {{ $months }}</p>
        <p>Amount: {{ $total_amount }}</p>
        <!-- Add more fields as needed -->

        <!-- Add a form for selecting payment options -->
        <form action="{{ route('payment.confirm') }}" method="post">
            @csrf
            <label for="payment_option">Select Payment Option:</label>
            <select name="payment_option" id="payment_option">
                <option value="cod">Cash on Delivery</option>
                <option value="online">Online Payment</option>
            </select>
            <button type="submit">Confirm Payment</button>
        </form>
    </div>

    <!-- Other content on your payment page -->

</body>
</html>