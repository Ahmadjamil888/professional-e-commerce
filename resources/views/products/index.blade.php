@extends('layouts.app')

@section('title', 'All Products')

@section('content')
<style>
    .container {
        max-width: 95%;
        margin: 50px auto;
        font-family: 'Segoe UI', sans-serif;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
    }

    h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 20px;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .btn {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .alert {
        padding: 12px 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-weight: 500;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 5px solid #28a745;
    }

    .alert-info {
        background-color: #e9f7fd;
        color: #0c5460;
        border-left: 5px solid #17a2b8;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-size: 15px;
    }

    thead {
        background-color: #343a40;
        color: white;
    }

    th, td {
        padding: 12px 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        vertical-align: middle;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    img {
        border-radius: 5px;
        max-height: 60px;
    }

    .actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
</style>

<div class="container">
    <div class="top-bar">
        <h2>All Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add New Product</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($products->isEmpty())
        <div class="alert alert-info">No products available. Add some now!</div>
    @else
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price (Rs)</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ Str::limit($product->description, 60) }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>

                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit">Add to Cart</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
