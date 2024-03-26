<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
  public function book()
  {
    $books = Book::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()->toArray();
  }


  public function index()
  {

    $books = Book::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

    return view('books.index', compact('books'));
    // return view('books.index', ['books' => $books]);
  }
  public function create()
  {
    return view('books.create');
  }

  public function repay(Book $book)
  {
    session(['book_id' => $book->id]);
    return view('books.payment', compact('book'));
  }

  public function store(Request $request)
  {
    // Validate the request, including the images
    $validatedData = $request->validate([
      'institution' => 'required|string',
      'hostel' => 'required|string',
      'duration' => 'string',
      'jute_boxes' => 'required|string',
      'months' => 'required|string',
      'total_amount' => 'required|string',
      'pickup' => 'required|date',
      'return' => 'required|date',
      'address' => 'required|string',
      'description' => 'required|string',
      'latitude' => 'required|string',
      'longitude' => 'required|string',
      'location_address' => 'required|string',
      'image' => 'array', // Validation for multiple images
    ]);

    // Create a new Book record without the image field initially
    $book = Book::create([
      'institution' => $request->input('institution'),
      'hostel' => $request->input('hostel'),
      'duration' => $request->input('duration'),
      'months' => $request->input('months'),
      'jute_boxes' => $request->input('jute_boxes'),
      'total_amount' => $request->input('total_amount'),
      'pickup' => $request->input('pickup'),
      'return' => $request->input('return'),
      'address' => $request->input('address'),
      'description' => $request->input('description'),
      'latitude' => $request->input('latitude'),
      'longitude' => $request->input('longitude'),
      'location_address' => $request->input('location_address'),
      'user_id' => auth()->id(), // Assuming you're using authentication
    ]);

    // Handle multiple file upload
    if ($request->hasFile('image')) { // Ensure this matches your form's input name
      $imagePaths = []; // Initialize an array to hold the image paths

      foreach ($request->file('image') as $file) { // This should match the name attribute in your form
        $name = time() . rand(1, 100) . '.' . $file->extension();
        $file->move(public_path('images'), $name); // Move the file to the public/images directory
        $imagePaths[] = '/images/' . $name; // Add the path to the array
      }


      // Store the JSON-encoded array of image paths in the 'image' column
      $book->image = json_encode($imagePaths);
      $book->save();
    } else {
      // Log or handle the case where no images are uploaded
      Log::warning('No images were uploaded for book ID: ' . $book->id);
    }


    session(['book_id' => $book->id]);

    return view('books.payment', compact('book'));
  }
  public function processPaymentPage(Book $book)
  {
    // dd($book);
    // $bookId = session('booking_id');
    // $book = Book::findOrFail($bookId);
    if ($book->payment_method === 'COD') {
      // For COD, update the booking status to 'paid
      return view('booksss.bank', compact('book'));
    } elseif ($book->payment_method === 'Bank Transfer') {
      return view('bookdds.bank', compact('book'));
    } else {
      // Add your actual payment processing logic here for other payment methods
      // For simplicity, let's assume the payment is successful
      // Replace this with the actual logic for integrating with a payment gateway
    }

    return view('books.processPaymentpage', compact('book'));
  }
  public function processPayment()
  {
    // Retrieve the booking ID from the session
    $bookId = session('booking_id');
    $book = Book::findOrFail($bookId);

    if ($book->payment_method === 'COD') {
      // For COD, update the booking status to 'paid'
      $book->update(['status' => 'pending']);
      return view('books.bank', compact('book'));
    } elseif ($book->payment_method === 'Bank Transfer') {
      // For Bank Transfer, update the booking status to 'pending' and display bank details
      $book->update(['status' => 'pending']);
      return view('booksss.bank', compact('book'));
    } else {
      // Add your actual payment processing logic here for other payment methods
      // For simplicity, let's assume the payment is successful
      // Replace this with the actual logic for integrating with a payment gateway
    }

    // Clear the session
    session()->forget('book_id');

    return redirect()->route('books.index')->with('success', 'Booking and payment processed successfully.');
  }


  public function complete()
  {
    // Retrieve the booking ID from the session
    $bookId = session('book_id');
    $book = Book::findOrFail($bookId);
    //dd($bookId); // Commented out temporarily

    // Check the payment method
    if ($book->payment_method === 'COD') {
      // For COD, update the booking status to 'pending'
      $book->update(['status' => 'pending']);
    } elseif ($book->payment_method === 'Bank Transfer') {
      // For Bank Transfer, update the booking status to 'pending' and display bank details
      $book->update(['status' => 'pending']);
      return view('books.bank', compact('book'));
    } else {
      // Add your actual payment processing logic here for other payment methods
      // For simplicity, let's assume the payment is successful
      // Replace this with the actual logic for integrating with a payment gateway
      return view('books.bank', compact('book'));
    }

    // Clear the session
    session()->forget('book_id');

    // Now, this part is reachable
    return view('complete', compact('book'));
  }
  public function views(Book $book)
  {

    return view('books.views', ['book' => $book]);
  }


  public function edit(Book $book)
  {
    return view('books.edit', ['book' => $book]);
  }

  public function update(Book $book, Request $request)
  {
    $data = $request->validate([
      'institution' => 'required',
      'hostel' => 'required',
      'description' => 'required',
    ]);

    $book->update($data);
    return redirect(route('book.index'))->with('success', 'Book updated successfully');
  }

  public function destroy(Book $book, Request $request)
  {
    $book->delete();
    return redirect(route('book.index'))->with('success', 'Book deleted successfully');
  }
}
