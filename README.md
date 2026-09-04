# Surat Grocery — Complete Laravel Project

A simple vegetarian grocery ordering website for Surat, Gujarat.

## Included
- Full Laravel project structure
- `config/` files
- `storage/` structure
- `.env.example`
- Public storefront
- Vegetarian grocery catalogue
- Rice, wheat/atta and cooking oil included
- No egg, meat or fish products
- Cart and checkout
- Surat-only address validation
- Admin login
- Admin dashboard
- Product/category CRUD
- Order management and delivery status

## Admin test account
Email: `admin@suratgrocery.test`
Password: `password`

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

SQLite is configured by default and `database/database.sqlite` is included.

## Main URLs
Store: `/`
Products: `/products`
Cart: `/cart`
Admin: `/admin/login`
