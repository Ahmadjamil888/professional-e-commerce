@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f8;
    }

    .container {
        max-width: 700px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
        font-size: 28px;
        text-align: center;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 6px;
        display: inline-block;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        margin-top: 5px;
        margin-bottom: 20px;
        transition: border 0.2s;
    }

    .form-control:focus {
        border-color: #0066cc;
        outline: none;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .alert-danger {
        background-color: #ffeded;
        border-left: 5px solid #e74c3c;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        color: #c0392b;
    }

    .alert-danger ul {
        margin-top: 10px;
        padding-left: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        margin-left: 10px;
        text-decoration: none;
        display: inline-block;
        line-height: 36px;
        text-align: center;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-group {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
    }
</style>

<div class="container">
    <h2>Create New Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="form-label" for="name">Product Name *</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>

        <label class="form-label" for="description">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>

        <label class="form-label" for="price">Price (Rs) *</label>
        <input type="number" name="price" value="{{ old('price') }}" class="form-control" step="0.01" required>

        <label class="form-label" for="stock">Stock Quantity *</label>
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" required>

        <label class="form-label" for="image">Product Image (optional)</label>
        <input type="file" name="image" class="form-control" accept="image/*">

        <div class="btn-group">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Create Product</button>
        </div>
    </form>
</div>
@endsection
