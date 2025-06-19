<nav id="navbar">
        
        
        <ul class="nav-links" id="navLinks">
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/shopping">Products</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/testimonials">Testimonials</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
            <li>
                <a href="javascript:void(0);" onclick="toggleCart()" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">0</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 8px 20px;">
                    <i class="fas fa-user"></i> Login
                </a>
            </li>
        </ul>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
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
        
    </nav>