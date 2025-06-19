@include('navbar')
<!-- Featured Categories -->
    <section class="featured-categories" id="categories">
        <div class="container">
            <div class="section-title">
                <h2>Featured Categories</h2>
                <p>Browse through our most popular product categories</p>
            </div>
            
            <div class="categories-grid">
                <div class="category-card animate">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" alt="Electronics">
                    </div>
                    <div class="category-info">
                        <h3>Electronics</h3>
                        <p>The latest gadgets and devices</p>
                        <a href="/shopping" class="category-link">Shop Now →</a>
                    </div>
                </div>
                
                <div class="category-card animate delay-1">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891" alt="Fashion">
                    </div>
                    <div class="category-info">
                        <h3>Fashion</h3>
                        <p>Trendy outfits for every occasion</p>
                        <a href="/shopping" class="category-link">Shop Now →</a>
                    </div>
                </div>
                
                <div class="category-card animate delay-2">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1556228453-efd6c1ff04f6" alt="Home & Living">
                    </div>
                    <div class="category-info">
                        <h3>Home & Living</h3>
                        <p>Elevate your living space</p>
                        <a href="/shopping" class="category-link">Shop Now →</a>
                    </div>
                </div>
                
                <div class="category-card animate delay-3">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12" alt="Beauty">
                    </div>
                    <div class="category-info">
                        <h3>Beauty</h3>
                        <p>Premium skincare and cosmetics</p>
                        <a href="/shopping" class="category-link">Shop Now →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('footer')