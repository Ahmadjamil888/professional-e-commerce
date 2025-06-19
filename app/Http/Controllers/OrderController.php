<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;

class OrderController extends Controller
{
    /**
     * Display a list of the authenticated user's orders.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('payment')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display a single order's detail.
     */
    public function show($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('payment')
            ->firstOrFail();

        return view('orders.show', compact('order'));
    }

    /**
     * (Optional) Admin: list all orders.
     */
    public function adminIndex()
    {
        $orders = Order::with('user', 'payment')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * (Optional) Admin: update order status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }
}
