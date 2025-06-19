
# Professional E-Commerce Platform (Laravel)

This is a full-featured e-commerce web application built using the Laravel framework. It includes essential features such as product management, user authentication, shopping cart, order processing, and a secure admin panel. The platform is designed with scalability and maintainability in mind, suitable for professional and commercial deployment.

---

## Frontend Preview

![Frontend](https://raw.githubusercontent.com/Ahmadjamil888/professional-e-commerce/refs/heads/main/public/screencapture-127-0-0-1-8000-2025-06-19-13_35_55.png)

---

## Admin Panel Preview

![Admin Panel](https://raw.githubusercontent.com/Ahmadjamil888/professional-e-commerce/refs/heads/main/public/screencapture-127-0-0-1-8000-dashboard-2025-06-19-13_36_33.png)

---

## Key Features

- Admin authentication and authorization
- CRUD operations for products
- Product catalog and user-friendly storefront
- Shopping cart functionality
- Order placement and tracking
- Payment integration-ready structure
- Admin dashboard for managing users, orders, and inventory
- Laravel Breeze-based authentication system
- Built using Laravel 10, Blade templates, and MySQL

---

## Admin Login Credentials

To access the admin panel, use the following credentials:

- Email: `admin@gmail.com`
- Password: `ADMIN@password`

---

## Installation Instructions

To set up this project on your local machine, follow these steps:

```bash
# Clone the repository
git clone https://github.com/Ahmadjamil888/professional-e-commerce.git

# Navigate to the project directory
cd professional-e-commerce

# Install backend dependencies
composer install

# Install frontend dependencies
npm install && npm run dev

# Copy and configure the environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in the .env file, then run:
php artisan migrate --seed

# Serve the application
php artisan serve
```

---

## Technologies Used

- Laravel Framework (v10+)
- PHP 8+
- Blade Templating Engine
- MySQL Database
- HTML, CSS, JavaScript
- Laravel Breeze for Authentication

---

## License

This project is open-source and licensed under the MIT License.
