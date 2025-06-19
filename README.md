
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
cd laravel

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
## PHP UNIT tests
```
PS C:\Users\Admin\Desktop\laravel-ecommerce\laravel> php artisan test
PHP Warning:  Module "openssl" is already loaded in Unknown on line 0

Warning: Module "openssl" is already loaded in Unknown on line 0

Warning: Module "openssl" is already loaded in Unknown on line 0
PHP Warning:  Module "openssl" is already loaded in Unknown on line 0

   PASS  Tests\Unit\ExampleTest
  ✓ that true is true                                                                                           1.91s  

   PASS  Tests\Feature\Auth\AuthenticationTest
  ✓ login screen can be rendered                                                                                8.66s  
  ✓ users can authenticate using the login screen                                                               3.14s  
  ✓ users can not authenticate with invalid password                                                            0.36s  
  ✓ users can logout                                                                                            0.04s  

   PASS  Tests\Feature\Auth\EmailVerificationTest
  ✓ email verification screen can be rendered                                                                   0.54s  
  ✓ email can be verified                                                                                       0.25s  
  ✓ email is not verified with invalid hash                                                                     0.22s  

   PASS  Tests\Feature\Auth\PasswordConfirmationTest
  ✓ confirm password screen can be rendered                                                                     0.61s  
  ✓ password can be confirmed                                                                                   0.02s  
  ✓ password is not confirmed with invalid password                                                             0.23s  

   PASS  Tests\Feature\Auth\PasswordResetTest
  ✓ reset password link screen can be rendered                                                                  0.74s  
  ✓ reset password link can be requested                                                                        1.61s  
  ✓ reset password screen can be rendered                                                                       1.43s  
  ✓ password can be reset with valid token                                                                      0.41s  

   PASS  Tests\Feature\Auth\PasswordUpdateTest
  ✓ password can be updated                                                                                     0.03s  
  ✓ correct password must be provided to update password                                                        0.05s  

   PASS  Tests\Feature\Auth\RegistrationTest
  ✓ registration screen can be rendered                                                                         0.04s  
  ✓ new users can register                                                                                      0.08s  

   PASS  Tests\Feature\ExampleTest
  ✓ it returns a successful response                                                                            0.06s  

   PASS  Tests\Feature\ProfileTest
  ✓ profile page is displayed                                                                                   0.07s  
  ✓ profile information can be updated                                                                          0.15s  
  ✓ email verification status is unchanged when the email address is unchanged                                  0.13s  
  ✓ user can delete their account                                                                               0.03s  
  ✓ correct password must be provided to delete account                                                         0.03s  

  Tests:    25 passed (61 assertions)
  Duration: 31.81
```
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
