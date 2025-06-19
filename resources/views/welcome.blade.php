<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shazab's Store | Premium Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #f72585;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4caf50;
            --danger: #f44336;
            --warning: #ff9800;
        }

        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            color: var(--dark);
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            padding: 10px 50px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary);
            text-decoration: none;
        }

        .logo img {
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
            align-items: center;
        }

        .nav-links li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            padding: 5px 0;
        }

        .nav-links li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s;
        }

        .nav-links li a:hover:after {
            width: 100%;
        }

        .nav-links li a:hover {
            color: var(--primary);
        }

        .nav-links li a.active {
            color: var(--primary);
            font-weight: 600;
        }

        .nav-links li a.active:after {
            width: 100%;
        }

        .cart-icon {
            position: relative;
            font-size: 1.2rem;
            color: var(--dark);
            transition: all 0.3s;
        }

        .cart-icon:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            justify-content: center;
            animation: fadeInUp 1s ease 0.4s forwards;
            opacity: 0;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.5);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary-dark);
            transform: translateY(-3px);
        }

        /* Featured Categories */
        .featured-categories {
            padding: 100px 50px;
            background: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.2rem;
            color: var(--primary-dark);
            margin-bottom: 15px;
        }

        .section-title p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            margin: 20px auto 0;
            border-radius: 2px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .category-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .category-img {
            height: 200px;
            overflow: hidden;
        }

        .category-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .category-card:hover .category-img img {
            transform: scale(1.1);
        }

        .category-info {
            padding: 20px;
            text-align: center;
        }

        .category-info h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .category-info p {
            color: #666;
            margin-bottom: 15px;
        }

        .category-link {
            display: inline-block;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .category-link:hover {
            color: var(--secondary);
        }

        /* Products Section */
        .products-section {
            padding: 100px 50px;
            background: #f8f9fa;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary);
            color: white;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .product-card:hover .product-img img {
            transform: scale(1.1);
        }

        .product-actions {
            position: absolute;
            bottom: 15px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 10px;
            opacity: 0;
            transition: all 0.3s;
            transform: translateY(20px);
        }

        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .product-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .product-rating {
            color: var(--warning);
            font-size: 0.9rem;
        }

        .product-card .btn {
            width: 100%;
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 50px;
            background: white;
        }

        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: relative;
        }

        .testimonial-card:before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 5rem;
            color: rgba(67, 97, 238, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-content {
            margin-bottom: 20px;
            color: #555;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            font-size: 1rem;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        .author-info p {
            font-size: 0.8rem;
            color: #777;
        }

        /* Newsletter */
        .newsletter {
            padding: 80px 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-align: center;
        }

        .newsletter-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .newsletter p {
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }

        .newsletter-form button {
            padding: 15px 25px;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 0 50px 50px 0;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .newsletter-form button:hover {
            background: #e91e63;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: #ddd;
            padding: 80px 50px 30px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-col h3 {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--accent);
        }

        .footer-col p {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: var(--accent);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 50px;
            margin-top: 50px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100%;
            background: #fff;
            box-shadow: -5px 0 30px rgba(0,0,0,0.1);
            transition: right 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            padding: 25px;
            z-index: 1100;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .cart-header h3 {
            font-size: 1.5rem;
            color: var(--primary-dark);
            margin: 0;
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #999;
            cursor: pointer;
            transition: all 0.3s;
        }

        .close-cart:hover {
            color: var(--danger);
            transform: rotate(90deg);
        }

        .cart-items {
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f5f5f5;
        }

        .cart-item-img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .cart-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .cart-item-price {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #f5f5f5;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .quantity-btn:hover {
            background: var(--primary);
            color: white;
        }

        .remove-item {
            margin-left: auto;
            color: #999;
            cursor: pointer;
            transition: all 0.3s;
        }

        .remove-item:hover {
            color: var(--danger);
        }

        .cart-summary {
            margin-top: auto;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .cart-total span {
            color: var(--primary);
        }

        .cart-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .checkout-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .continue-shopping {
            background: #f5f5f5;
            color: var(--dark);
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
        }

        .continue-shopping:hover {
            background: #e0e0e0;
        }

        .empty-cart {
            text-align: center;
            margin-top: 50px;
            color: #999;
        }

        .empty-cart i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ddd;
        }

        .empty-cart p {
            margin-bottom: 20px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1000;
        }

        .overlay.active {
            display: block;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.2s;
        }

        .delay-2 {
            animation-delay: 0.4s;
        }

        .delay-3 {
            animation-delay: 0.6s;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background: white;
                flex-direction: column;
                align-items: flex-start;
                padding: 40px;
                box-shadow: 5px 0 20px rgba(0,0,0,0.1);
                transition: all 0.4s ease;
            }

            .nav-links.active {
                left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 15px 20px;
            }

            .hero {
                height: 80vh;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .section {
                padding: 60px 20px;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-form input {
                border-radius: 50px;
                margin-bottom: 10px;
            }

            .newsletter-form button {
                border-radius: 50px;
            }

            .cart-sidebar {
                width: 100%;
                max-width: 380px;
            }
        }

        @media (max-width: 576px) {
            .hero-btns {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="animate">Premium Products for Modern Life</h1>
            <p class="animate delay-1">Discover the perfect blend of quality, style, and innovation with our curated collection</p>
            <div class="hero-btns animate delay-2">
                <a href="/products" class="btn btn-primary">Shop Now</a>
                <a href="/categories" class="btn btn-outline">Explore</a>
            </div>
        </div>
    </section>

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

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="testimonials-container">
            <div class="section-title">
                <h2>What Our Customers Say</h2>
                <p>Hear from our satisfied customers about their shopping experience</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card animate">
                    <div class="testimonial-content">
                        "I've been shopping at Shazab's Store for years and the quality of products never disappoints. Their customer service is exceptional!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Loyal Customer</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card animate delay-1">
                    <div class="testimonial-content">
                        "The delivery was super fast and the product exceeded my expectations. Will definitely shop here again!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen">
                        </div>
                        <div class="author-info">
                            <h4>Michael Chen</h4>
                            <p>First-time Buyer</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card animate delay-2">
                    <div class="testimonial-content">
                        "Great selection of products at competitive prices. The website is easy to navigate and checkout was a breeze."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emma Rodriguez">
                        </div>
                        <div class="author-info">
                            <h4>Emma Rodriguez</h4>
                            <p>Frequent Shopper</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-container">
            <h2 class="animate">Subscribe to Our Newsletter</h2>
            <p class="animate delay-1">Get the latest updates on new products, special offers, and more!</p>
            <form class="newsletter-form animate delay-2">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')
    <!-- Cart Sidebar -->
    <div class="overlay" id="overlay"></div>
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <button class="close-cart" onclick="toggleCart()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="cart-items" id="cartItems">
            <!-- Cart items will be added here dynamically -->
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Your cart is empty</p>
                <a href="#products" class="btn btn-primary" onclick="toggleCart()">Continue Shopping</a>
            </div>
        </div>
        
        <div class="cart-summary" id="cartSummary" style="display: none;">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cartTotal">PKR 0</span>
            </div>
            <div class="cart-actions">
                <button class="checkout-btn">
                    <i class="fas fa-credit-card"></i> Proceed to Checkout
                </button>
                <a href="#products" class="continue-shopping" onclick="toggleCart()">Continue Shopping</a>
            </div>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });
        
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Initialize Vanta.js background
        VANTA.BIRDS({
            el: ".hero",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            backgroundColor: 0x4361ee,
            color1: 0xf72585,
            color2: 0x4cc9f0,
            birdSize: 1.50,
            wingSpan: 20.00,
            speedLimit: 4.00,
            separation: 60.00,
            alignment: 27.00,
            cohesion: 29.00
        });
        
        // Cart functionality
        let cart = [];
        
        function toggleCart() {
            const cartSidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('overlay');
            
            cartSidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            // Prevent scrolling when cart is open
            if (cartSidebar.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
        
        function addToCart(id, name, price, image) {
            // Check if item already exists in cart
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    image,
                    quantity: 1
                });
            }
            
            updateCart();
            showAddToCartNotification(name);
        }
        
        function updateCart() {
            const cartItemsEl = document.getElementById('cartItems');
            const cartCountEl = document.getElementById('cartCount');
            const cartTotalEl = document.getElementById('cartTotal');
            const cartSummaryEl = document.getElementById('cartSummary');
            const emptyCartEl = cartItemsEl.querySelector('.empty-cart');
            
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountEl.textContent = totalItems;
            
            if (cart.length === 0) {
                emptyCartEl.style.display = 'block';
                cartSummaryEl.style.display = 'none';
                return;
            }
            
            emptyCartEl.style.display = 'none';
            cartSummaryEl.style.display = 'block';
            
            // Calculate total
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotalEl.textContent = `PKR ${total.toLocaleString()}`;
            
            // Update cart items
            cartItemsEl.innerHTML = '';
            
            cart.forEach(item => {
                const cartItemEl = document.createElement('div');
                cartItemEl.className = 'cart-item';
                cartItemEl.innerHTML = `
                    <div class="cart-item-img">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="cart-item-details">
                        <h4 class="cart-item-title">${item.name}</h4>
                        <div class="cart-item-price">PKR ${item.price.toLocaleString()} x ${item.quantity}</div>
                        <div class="cart-item-actions">
                            <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <span>${item.quantity}</span>
                            <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                            <button class="remove-item" onclick="removeFromCart(${item.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                
                cartItemsEl.appendChild(cartItemEl);
            });
        }
        
        function updateQuantity(id, change) {
            const item = cart.find(item => item.id === id);
            
            if (item) {
                item.quantity += change;
                
                if (item.quantity <= 0) {
                    removeFromCart(id);
                } else {
                    updateCart();
                }
            }
        }
        
        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCart();
        }
        
        function showAddToCartNotification(productName) {
            const notification = document.createElement('div');
            notification.className = 'add-to-cart-notification';
            notification.innerHTML = `
                <div class="notification-content">
                    <i class="fas fa-check-circle"></i>
                    <span>${productName} added to cart!</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Show notification
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);
            
            // Hide after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                
                // Remove after animation
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
        
        // Add notification styles dynamically
        const notificationStyles = document.createElement('style');
        notificationStyles.textContent = `
            .add-to-cart-notification {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: var(--success);
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                transform: translateY(100px);
                opacity: 0;
                transition: all 0.3s ease;
                z-index: 2000;
            }
            
            .add-to-cart-notification.show {
                transform: translateY(0);
                opacity: 1;
            }
            
            .notification-content {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            
            .notification-content i {
                font-size: 1.2rem;
            }
        `;
        document.head.appendChild(notificationStyles);
        
        // Animation on scroll
        const animateElements = document.querySelectorAll('.animate');
        
        function checkAnimation() {
            animateElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.style.opacity = 1;
                }
            });
        }
        
        window.addEventListener('scroll', checkAnimation);
        checkAnimation(); // Run once on page load
    </script>
</body>
</html>