@extends('layouts.app')

@section('title', 'Delete Product')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-danger">Delete Product</h2>

    <div class="alert alert-warning">
        <strong>Are you sure?</strong> You're about to delete the product:
        <span class="fw-bold text-dark">{{ $product->name }}</span>
    </div>

    <div class="card mb-4">
        <div class="row g-0">
            @if($product->image)
                <div class="col-md-3">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="Product Image">
                </div>
            @endif
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text mb-1"><strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}</p>
                    <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
