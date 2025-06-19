@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($cartItems->isEmpty())
        <div class="alert alert-info">Your cart is empty.</div>
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Continue Shopping</a>
    @else
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price (Rs)</th>
                            <th>Quantity</th>
                            <th>Subtotal (Rs)</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $index => $item)
                            @php
                                $subtotal = $item->product->price * $item->quantity;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    @if ($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="Product Image" width="60">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ number_format($item->product->price, 2) }}</td>
                                <td>
                                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" class="form-control" min="1" style="width: 80px;">
                                </td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                                <td>
                                    <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Remove this item from cart?')">X</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="table-light">
                            <td colspan="5" class="text-end fw-bold">Total:</td>
                            <td colspan="2" class="fw-bold">Rs. {{ number_format($total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
                <div>
                    <button type="submit" class="btn btn-warning me-2">Update Cart</button>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection
