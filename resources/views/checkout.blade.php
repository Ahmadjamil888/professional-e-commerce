@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($cartItems->isEmpty())
        <div class="alert alert-info">Your cart is empty. <a href="{{ route('products.index') }}">Shop now</a>.</div>
    @else
        <div class="row">
            <!-- Billing Information -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Billing Information</div>
                    <div class="card-body">
                        <form action="{{ route('checkout.process') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <textarea name="address" rows="3" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <!-- Optional: Add payment options -->

                            <button type="submit" class="btn btn-success w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">Order Summary</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @php $total = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->product->name }} × {{ $item->quantity }}
                                    <span>Rs. {{ number_format($subtotal, 2) }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                Total
                                <span>Rs. {{ number_format($total, 2) }}</span>
                            </li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100">Edit Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
