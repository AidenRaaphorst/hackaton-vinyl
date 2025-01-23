## Installation

1. Copy `.env.example` to `.env` and set the correct values if needed.
2. Start the database and make the database with the name in `.env`.
3. Run the following commands:

```
composer install
npm install
php artisan key:generate
php artisan migrate:fresh --seed
```

## Start application

```
npm run dev
php artisan serve
```
