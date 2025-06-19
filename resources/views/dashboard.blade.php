@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f7fa;
        margin: 0;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .section {
        background: white;
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.07);
    }

    .section h3 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #333;
    }

    .top-action {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .btn {
        padding: 8px 14px;
        font-size: 14px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        border-radius: 6px;
        transition: background 0.3s;
    }

    .btn-blue {
        background-color: #007bff;
        color: white;
    }

    .btn-blue:hover {
        background-color: #0069d9;
    }

    .btn-red {
        color: #dc3545;
        background-color: transparent;
        border: none;
    }

    .btn-red:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
    }

    .table th, .table td {
        padding: 10px 12px;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
    }

    .table th {
        background-color: #f0f2f5;
        color: #333;
    }

    .table tr:hover {
        background-color: #f9f9f9;
    }

    .actions {
        display: flex;
        gap: 10px;
    }
</style>

<div class="dashboard-container">

    <!-- Products Section -->
    <div class="section">
        <div class="top-action">
            <h3>Products</h3>
            <a href="{{ route('products.create') }}" class="btn btn-blue">+ Create Product</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price (Rs)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-blue">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-red">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No products available.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Orders Section -->
    <div class="section">
        <h3>Recent Orders</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ number_format($order->total_amount) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('d M, Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5">No orders recorded.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Just for Fun Section -->
    <div class="section">
        <h3>🌟 Dashboard Fun Facts</h3>
        <ul>
            <li>📦 {{ count($products) }} amazing products in stock.</li>
            <li>🛒 {{ count($orders) }} heroic orders placed.</li>
            <li>🚀 Dashboard running smooth & blazing fast!</li>
            <li>😎 Admin vibes: always on point.</li>
            <li>🎯 99.9% uptime... unless someone pulls the plug!</li>
        </ul>
    </div>

</div>
@endsection
