<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;

// ------------------------------------------
// Public Routes
// ------------------------------------------

Route::get('/', function () {
    $products = Product::latest()->get();
    return view('welcome', compact('products'));
})->name('home');

Route::get('/shopping', function () {
    $products = Product::latest()->get();
    return view('shopping', compact('products'));
})->name('shopping');

Route::view('/categories', 'categories')->name('categories');
Route::view('/testimonials', 'testimonials')->name('testimonials');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// ------------------------------------------
// Dashboard Route (Authenticated & Verified)
// ------------------------------------------

Route::get('/dashboard', function () {
    $orders = Order::where('user_id', auth()->id())
                   ->with('items')
                   ->latest()
                   ->take(5)
                   ->get();

    $products = Product::latest()->get();
    $payments = Payment::with('user')->latest()->get();

    return view('dashboard', compact('orders', 'products', 'payments'));
})->middleware(['auth', 'verified'])->name('dashboard');

// ------------------------------------------
// Authenticated User Routes
// ------------------------------------------

Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Products
    Route::resource('products', ProductController::class)->except(['show']);

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/process/{order}', [PaymentController::class, 'process'])->name('payments.process');
});

// ------------------------------------------
// Auth Routes (Breeze / Fortify / Jetstream)
// ------------------------------------------

require __DIR__ . '/auth.php';
