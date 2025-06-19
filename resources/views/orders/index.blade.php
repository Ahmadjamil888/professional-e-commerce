@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">My Orders</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($orders->isEmpty())
        <div class="alert alert-info">You have not placed any orders yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Total (Rs)</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $order->id }}</td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @if ($order->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($order->status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif ($order->status === 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->payment && $order->payment->status === 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d M Y - h:i A') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                                {{-- Add more actions like cancel, print, etc., if needed --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
