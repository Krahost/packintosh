<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index']);
});

Route::get('/book', function () {
    return view('book');
})->middleware(['auth', 'verified'])->name('book');


Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/books/views/{book}', [BookController::class, 'views'])->name('books.views');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/books/{book}/payment', [BookController::class, 'processPaymentPage'])->name('books.processPaymentPage');
    Route::get('/books/{book}/payment', [BookController::class, 'repay'])->name('books.repay');
    Route::get('/complete/{book}', [BookController::class, 'complete'])->name('complete');
    Route::get('/books/{book}/bank', [BookController::class, 'bank'])->name('books.bank');
    Route::post('/books/{book}/pay-with-wallet', [PaymentController::class, 'payWithWallet'])->name('books.payWithWallet');
});

Route::middleware('auth')->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/settings', [UserController::class, 'settings'])->name('user.settings');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/confirm', [PaymentController::class, 'confirmation'])->name('payment.confirm');

    // Routes definition in routes/web.php
    Route::get('/manual-payment/{book}', [PaymentController::class, 'manualPayment'])->name('manual.payment');
    Route::get('/offline-payment/{book}', [PaymentController::class, 'offlinePayment'])->name('offline.payment');
    Route::get('/paystack/{book}', [PaymentController::class, 'payStack'])->name('paystack.payment');
    // Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    // Route::get('/pay/callback', [PaymentController::class, 'payment_callback'])->name('pay.callback');

    Route::get('/books/callback', [PaymentController::class, 'paymentCallback'])->name('books.callback');





    Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');
    Route::get('/wallet/deposits', [WalletController::class, 'deposits'])->name('wallet.deposits');
    Route::get('/wallet/callback', [WalletController::class, 'paymentCallback'])->name('wallet.callback');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');

    Route::get('/notifications/{id}', 'NotificationController@show')->name('notifications.show');
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('markAsRead');


    // Route::post('/books/processPayment', [BookController::class, 'processPayment'])->name('books.processPayment');




    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/profiledit', [UserController::class, 'profiledit'])->name('user.profiledit');
    Route::patch('/user/profiledate', [ProfileController::class, 'update'])->name('profile.update');
    // Route::get('/user/book', [UserController::class, 'book'])->name('user.book');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth', 'auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin/users.index');
    Route::get('/admin/books', [AdminController::class, 'books'])->name('admin/books.index');
    Route::get('/admin/books/pickup', [AdminController::class, 'pickup'])->name('admin/books.pickup');
    // Route::get('/admin/books/view', [AdminController::class, 'view'])->name('admin/books.view');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin/profile.index');
    Route::get('admin/books/view/{bookId}', [AdminController::class, 'view'])->name('books.view');
    Route::post('admin/books/update-payment', [AdminController::class, 'updatePaymentStatus'])->name('bookings.update-payment');
    Route::post('admin/books/update-status', [AdminController::class, 'updateStatus'])->name('bookings.update-status');

    Route::get('admin/books/{bookId}/edit', [AdminController::class, 'edit'])->name('books.edit');
    Route::put('admin/books/{bookId}', [AdminController::class, 'update'])->name('books.update');
    Route::get('admin/users/{user}/edit', [AdminController::class, 'useredit'])->name('users.edit');
    Route::put('admin/users/{user}', [AdminController::class, 'userupdate'])->name('users.update');

    Route::get('admin/payments', [AdminController::class, 'payments'])->name('admin/payments.index');
    Route::get('admin/payments/book', [AdminController::class, 'bookpayments'])->name('admin/payments.book');

    // Route::get('/notifications/read/{id}', 'NotificationController@markAsRead');
});

require __DIR__ . '/auth.php';
