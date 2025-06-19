<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Payment;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    /**
     * Handle checkout and place order.
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string', // e.g., COD, PayPal, etc.
        ]);

        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending', // or 'processing'
        ]);

        // Create payment record
        Payment::create([
            'order_id' => $order->id,
            'amount' => $total,
            'method' => $request->payment_method,
            'status' => 'unpaid', // Set to 'paid' if successful immediately
        ]);

        // Clear the cart
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
