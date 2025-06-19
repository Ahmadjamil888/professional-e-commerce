<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Show list of payments for the authenticated user.
     */
    public function index()
    {
        $payments = Payment::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('order')->latest()->get();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show a single payment detail.
     */
    public function show($id)
    {
        $payment = Payment::where('id', $id)
            ->whereHas('order', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with('order')
            ->firstOrFail();

        return view('payments.show', compact('payment'));
    }

    /**
     * (Optional) Admin: list all payments.
     */
    public function adminIndex()
    {
        $payments = Payment::with('order.user')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * (Optional) Admin: update payment status (paid, failed, refunded).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:paid,unpaid,failed,refunded',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;
        $payment->save();

        return redirect()->back()->with('success', 'Payment status updated.');
    }
}
