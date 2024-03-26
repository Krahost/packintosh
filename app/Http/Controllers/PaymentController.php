<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wallet;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\WalletTransaction;

class PaymentController extends Controller
{
    public function index()
    {
        // Retrieve booking details from session
        $book = Session::get('user.payment');

        return view('payment.index', [
            'institution' => $book ? $book->institution : null,
            'totalAmount' => $book ? $book->totalAmount : null,
        ]);
    }

    // Handle the payment confirmation
    public function confirmation(Request $request)
    {
        // Retrieve booking details from session
        $book = Session::get('user.payment');

        if (!$book) {
            return redirect('/books')->with('error', 'Invalid booking details.');
        }

        // Get the selected payment option
        $paymentOption = $request->input('payment_option');

        // Save the booking details to the database (if not already saved during booking)
        $savedBook = Book::updateOrCreate(
            ['totalAmount' => $book->totalAmount], // Assuming 'duration' is the unique identifier
            [
                'institution' => $book->institution,
                'totalAmount' => $book->totalAmount,
                // Add other attributes as needed
            ]
        );

        // Clear booking details from session
        Session::forget('user.payment');

        if ($paymentOption === 'cod') {
            return view('payment.confirm', [
                'paymentMethod' => 'Cash on Delivery',
                'institution' => $savedBook->institution,
                'totalAmount' => $savedBook->totalAmount,
            ]);
        } elseif ($paymentOption === 'online') {
            // You may redirect to an online payment gateway or show an online payment form
            return view('payment-confirmation', [
                'paymentMethod' => 'Online Payment',
                'institution' => $savedBook->institution,
                'totalAmount' => $savedBook->totalAmount,
            ]);
        } else {
            return redirect('/booking')->with('error', 'Invalid payment option.');
        }
    }


    public function manualPayment(Book $book)
    {
        return view('books.manual', ['book' => $book]);
    }

    public function offlinePayment(Book $book)
    {
        return view('books.offline', ['book' => $book]);
    }


    public function payWithWallet(Request $request)
    {
        $bookId = $request->input('book_id');  // Assuming you pass the book ID in the request
        $book = Book::findOrFail($bookId);  // Ensure the book exists

        // Retrieve the user's wallet. You might already have a method for this.
        $wallet = $this->getOrCreateWallet($request->user()->id);

        if ($wallet->balance >= $book->total_amount) {  // Assuming the book model has a 'price' attribute
            // Deduct the book price from the wallet balance
            $wallet->decrement('balance', $book->total_amount);

            // Record the transaction
            $wallet->transactions()->create([
                'type' => 'payment',
                'amount' => -$book->total_amount,  // Negative to indicate a deduction
                'description' => "Payment for booking ID {$book->id}using wallet",
                'book_id' => $book->id,  // Associate the transaction with the book
            ]);

            // Mark the booking as paid
            $book->payment = 'Paid';
            $book->save(); // Assuming there's an 'is_paid' attribute

            return redirect()->route('books.index', $book->id)->with('success', 'Booking payment successful using Wallet.');
        }

        return back()->withErrors('Insufficient wallet balance.');
    }


    public function payStack(Book $book)
    {

        return view('books.paystack', ['book' => $book]);
    }

    public function redirectToGateway(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'book_id' => 'required|numeric',
        ]);

        // Convert amount to smallest currency unit (e.g., kobo, cents)
        $amountInKobo = $validatedData['amount'] * 100;

        $formData = [
            'email' => $validatedData['email'],
            'amount' => $amountInKobo,
            'callback_url' => route('books.callback'), // Ensure this named route exists
            'metadata' => json_encode(['book_id' => $validatedData['book_id']])
        ];

        $paymentResponse = json_decode($this->initiatePayment($formData));
        // dd($paymentResponse);
        if (!empty($paymentResponse) && $paymentResponse->status) {
            return redirect($paymentResponse->data->authorization_url);
        }

        return back()->withErrors('Unable to initiate payment. Please try again.');
    }

    // public function paymentCallback()
    // {
    //     $paymentDetails = json_decode($this->verifyPayment(request('reference')));

    //     // if (!empty($paymentDetails) && $paymentDetails->status) {
    //     //     // Perform any necessary actions based on the payment data
    //     //     // For example, update the order status, send confirmation emails, etc.

    //     //     // Redirect or show a view on successful verification
    //     //     return view('books.sucess')->with(['paymentDetails' => $paymentDetails->data]);
    //     // }
    //     if ($paymentDetails && $paymentDetails->status == 'success') {
    //         // Retrieve your booking using the reference or any other identifier sent during payment initiation
    //         $bookId = $paymentDetails->data->metadata->book_id;
    //         $book = Book::find($bookId);

    //         if ($book) {
    //             // Update the payment status to 'Paid'
    //             $book->payment = 'Paid';
    //             $book->save();

    //             // Redirect to a success page or return a success response
    //             return redirect()->route('books.index')->with('success', 'Payment successful and booking status updated.');
    //         }
    //     }

    //     dd($paymentDetails);
    //     return back()->withErrors('Payment verification failed. Please try again.');
    // }

    public function paymentCallback()
    {
        $paymentDetails = json_decode($this->verifyPayment(request('reference')), true);

        if ($paymentDetails && $paymentDetails['status'] == 'success') {
            $metadata = is_string($paymentDetails['data']['metadata']) ? json_decode($paymentDetails['data']['metadata'], true) : $paymentDetails['data']['metadata'];
            $bookId = $metadata['book_id'];
            $book = Book::find($bookId);

            if ($book) {
                // Assuming you have a way to get or create a wallet for the booking's user
                $wallet = $this->getOrCreateWallet($book->user_id);

                $transaction = WalletTransaction::create([
                    'wallet_id' => $wallet->id,
                    'book_id' => $bookId,
                    'type' => 'payment',
                    'amount' => $paymentDetails['data']['amount'] / 100,  // Convert from smallest currency unit
                    'description' => 'Payment for booking ID: ' . $bookId . 'using Online Payment',
                    'reference' => $paymentDetails['data']['reference'],
                ]);

                // Update booking status or perform other necessary actions
                $book->payment = 'Paid';
                $book->save();


                return redirect()->route('books.index')->with('success', 'Payment successful and booking status updated.');
            }
        }

        return back()->withErrors('Payment verification failed. Please try again.');
    }

    public function initiatePayment(array $formData)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $fieldsString = http_build_query($formData);

        return $this->makeCurlRequest($url, $fieldsString, "POST");
    }

    public function verifyPayment($reference)
    {
        $url = "https://api.paystack.co/transaction/verify/" . urlencode($reference);

        return $this->makeCurlRequest($url, "", "GET");
    }

    protected function makeCurlRequest($url, $fieldsString, $method = "POST")
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        if ($method === "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'), // Ensure this is set in your config/services.php
            "Content-Type: application/x-www-form-urlencoded"
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // Optionally log the error or handle it as per your application's requirements
            return null;
        }

        curl_close($ch);

        return $response;
    }

    // // Correctly update the amount by multiplying by 100
    // $amountInCents = $request->amount * 100;

    // $metadata = json_encode(['book_id' => $request->book_id]);

    // return Paystack::getAuthorizationUrl([
    //     'email' => $request->email,
    //     'amount' => $amountInCents, // Use the updated amount here
    //     'metadata' => $metadata

    // ])->redirectNow();
    protected function getOrCreateWallet($userId)
    {
        return Wallet::firstOrCreate(['user_id' => $userId]);
    }
}
