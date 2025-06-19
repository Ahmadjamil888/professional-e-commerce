@extends('layouts.app')

@section('title', 'My Payments')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">My Payments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($payments->isEmpty())
        <div class="alert alert-info">No payments found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $index => $payment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $payment->order->id }}</td>
                            <td>Rs. {{ number_format($payment->amount, 2) }}</td>
                            <td>{{ ucfirst($payment->method) }}</td>
                            <td>
                                @if($payment->status == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @elseif($payment->status == 'unpaid')
                                    <span class="badge bg-warning text-dark">Unpaid</span>
                                @elseif($payment->status == 'failed')
                                    <span class="badge bg-danger">Failed</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($payment->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $payment->created_at->format('d M Y - h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
