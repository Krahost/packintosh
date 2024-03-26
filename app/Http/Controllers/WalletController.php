<?php

namespace App\Http\Controllers;

use App\Notifications\FundsDepositedNotification;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Unicodeveloper\Paystack\Facades\Paystack;

class WalletController extends Controller
{
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user(); // Ensure you have the 'use Illuminate\Support\Facades\Auth;' at the top
        $amountInKobo = $request->amount * 100;

        $formData = [
            'email' => $user->email, // Use the authenticated user's email
            'amount' => $amountInKobo,
            'callback_url' => route('wallet.callback'), // Make sure this route is defined
            'metadata' => json_encode(['user_id' => $user->id]) // Store user ID in metadata for identification in the callback
        ];

        $paymentResponse = json_decode($this->initiatePayment($formData));

        if (!empty($paymentResponse) && $paymentResponse->status) {
            return redirect($paymentResponse->data->authorization_url);
        }

        return back()->withErrors('Unable to initiate payment. Please try again.');
    }

    public function paymentCallback(Request $request)
    {
        // $paymentReference = request('reference');

        // // Check if this payment reference has already been processed
        // if (WalletTransaction::where('reference', $paymentReference)->exists()) {
        //     return redirect()->route('wallet.index')->withErrors('Payment has already been processed.');
        // }

        // $paymentDetails = json_decode($this->verifyPayment($paymentReference));
        $paymentDetails = json_decode($this->verifyPayment(request('reference')), true);

        if ($paymentDetails && $paymentDetails['status'] == 'success') {
            $metadata = is_string($paymentDetails['data']['metadata']) ? json_decode($paymentDetails['data']['metadata'], true) : $paymentDetails['data']['metadata'];
            $userId = $metadata['user_id'];

            $user = User::find($userId);
            $wallet = $user->wallet()->firstOrCreate(['user_id' => $user->id,]);

            DB::transaction(function () use ($wallet, $paymentDetails, $request, &$duplicateEntry) { // Pass by reference
                $amount = $paymentDetails['data']['amount'] / 100;
                $wallet->increment('balance', $amount);
                try {
                    $transaction = $wallet->transactions()->create([
                        'type' => 'deposit',
                        'amount' => $amount,
                        'description' => 'Deposit via Paystack',
                        'reference' => $paymentDetails['data']['reference'],
                    ]);
                } catch (QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == 1062) {
                        $duplicateEntry = true; // Set the flag if a duplicate entry error occurs
                    }
                }
            });

            if ($duplicateEntry) {
                return back()->withErrors(['error' => 'A transaction with the same reference already exists. Please start a new payment.']);
            }

            $request->session()->put('processed_payment_' . $paymentDetails['data']['reference'], true);

            $user->notify(new FundsDepositedNotification());

            return view('wallet.success')->with(['success' => 'Successfully Deposited, don\'t refresh the page . click on balance to confirm', 'paymentDetails' => $paymentDetails['data']]);
        }

        return redirect()->route('wallet.index')->withErrors('Payment verification failed. Please try again.');
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

    public function index()
    {
        $user = Auth::user();
        $wallet = $user->wallet()->firstOrCreate([
            'user_id' => $user->id,
        ]);

        return view('wallet.index', ['balance' => $wallet->balance]);
    }

    public function deposits()
    {
        return view('wallet.deposits');
    }
}
