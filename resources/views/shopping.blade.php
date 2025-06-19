@include('navbar')
<!-- Products Section -->
    <section class="products-section" id="products">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
                <p>Discover our handpicked selection of premium products</p>
            </div>
            
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card animate">
                        @if($product->id % 3 == 0)
                            <span class="product-badge">Sale</span>
                        @elseif($product->id % 4 == 0)
                            <span class="product-badge">New</span>
                        @endif
                        
                        <div class="product-img">
                            <img src="https://picsum.photos/400/300?random={{ $product->id }}" alt="{{ $product->name }}">
                            <div class="product-actions">
                                <button class="action-btn" title="Quick View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn" title="Add to Wishlist">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="action-btn" title="Compare">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <div class="product-meta">
                                <span class="product-price">PKR {{ number_format($product->price) }}</span>
                                <span class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                            </div>
                            <button class="btn btn-primary" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, 'https://picsum.photos/400/300?random={{ $product->id }}')">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@include('footer')