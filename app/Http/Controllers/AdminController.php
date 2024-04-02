<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\WalletTransaction;
use App\Models\Book;
use App\Models\Wallet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalusers = User::where("is_admin", "0")->count();

        $todayDate = Carbon::now()->format("Y-m-d");

        $books = Book::count();
        $todayBooks = Book::whereDate("created_at", $todayDate)->count();
        $todayUsers = User::whereDate("created_at", $todayDate)->count();



        $today = Carbon::today();
        $todaysDeposits = WalletTransaction::where('type', 'deposit')
            ->whereDate('created_at', $today)
            ->sum('amount');
        $totalDeposits = WalletTransaction::where('type', 'deposit')->sum('amount');


        $todayBookPayments = WalletTransaction::where('type', 'payment')->whereDate('created_at', $today)->sum('amount'); // Sums up all deposit amounts

        $totalBookPayments = WalletTransaction::where('type', 'payment')->sum('amount');



        return view('admin.dashboard', compact('books', "totalusers", "todayBooks", 'todayDate', "todayUsers", 'totalBookPayments', 'totalDeposits', "todayBookPayments", "todaysDeposits"));
    }

    public function users()
    {
        // $users = User::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin/users.index', ['users' => $users]);
    }

    public function books()
    {

        $books = Book::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $books = Book::with('user')->orderBy('id', 'desc')->paginate(10);
        $users = User::all();
        return view('admin/books.index', compact('books', "users"));
    }

    public function pickup()
    {


        $todayDate = Carbon::now()->format("Y-m-d");

        // Fetch books assigned for pickup to the authenticated user and paginate the results
        // $books = Book::where('pickup', Auth::user()->id)
        //     ->orderBy('pickup', 'desc')
        //     ->paginate(10);

        $books = Book::with('user')
            //  ->where('user_id', Auth::user()->id) // Filters books for the logged-in user
            ->where('Status', '=', 'pending') // include books that are pending
            ->orderBy('pickup', 'asc') // Assuming 'pickup_date' is the field name
            ->paginate(10);

        $users = User::all();
        return view('admin/books.pickup', compact('books', "users"));
    }


    public function useredit(User $user)
    {
        return view('admin/users.edit', compact('user'));
    }


    public function userupdate(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'bio' => 'nullable',
            'password' => 'nullable|min:6|confirmed',

        ]);

        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->bio = $request->bio;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin/users.index')->with('success', 'User updated successfully');
    }


    public function view($bookId)
    {
        // Find the book by ID. Consider using 'findOrFail' to throw a 404 error if the book doesn't exist
        $book = Book::findOrFail($bookId);

        // Return the view with the book details
        return view('admin/books.view', compact('book'));
    }

    public function profile()
    {
        return view('admin/profile.index');
    }

    public function updatePaymentStatus(Request $request)
    {
        $bookingId = $request->input('bookingId');
        $paymentStatus = $request->input('paymentStatus');

        $booking = Book::find($bookingId);

        if ($booking) {
            $booking->payment = $paymentStatus;
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Payment status updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Booking not found.'], 404);
    }
    public function updateStatus(Request $request)
    {
        $booking = Book::find($request->input('id'));

        if (!$booking) {
            return response()->json(['success' => false, 'message' => 'Booking not found.'], 404);
        }

        // Update payment status if provided
        if ($request->has('payment')) {
            $booking->payment = $request->input('payment');
        }

        // Update booking status if provided
        if ($request->has('Status')) {
            $booking->Status = $request->input('Status');
        }

        $booking->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    public function edit($id)
    {
        $book = Book::with('user')->findOrFail($id);
        return view('admin/books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required',
            'total_amount' => 'required',
            'pickup' => 'required|date',
            'return' => 'required|date',
            // 'address' => 'required',
            // 'location_address' => 'required',
        ]);

        $book = Book::findOrFail($id);
        // $book->user->name = $request->name;
        $book->total_amount = $request->total_amount;
        $book->pickup = $request->pickup;
        $book->return = $request->return;
        // $book->address = $request->address;
        // $book->location_address = $request->location_address;
        $book->save();

        return redirect()->route('admin/books.index')->with('success', 'Booking updated successfully');
    }

    public function payments(Request $request)
    {

        // {{ $transaction->wallet->user->name }}

        $transactions = WalletTransaction::with('wallet.user')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin/payments.index', compact('transactions'));
    }
    public function bookpayments(Request $request)
    {

        // {{ $transaction->wallet->user->name }}

        // $transactions = WalletTransaction::with('wallet.user')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin/payments.book', compact('transactions'));
    }
}
