# ClubScope Laravel Codebase

This repository now contains a full Laravel-style source code structure for your Club platform with backend modules and frontend Blade pages.

## Implemented modules
- Home
- Locate/Search clubs by location/name
- Club profile page (overview, timings, location, reviews)
- List/Register your club
- Coaches/Academy profiles
- Resources (YouTube + external links)
- Tournaments (overview, date/time, live link, registration, winners)
- Hall of Fame
- User registration entry points (player / coach)
- News & Events
- Banner management data model
- Full Admin Panel (`/admin`) for users, clubs, coaches, tournaments, resources, news, banners, and hall of fame
- Static pages (About, Contact, Terms, Policy)

## Key implementation decisions
- Unique club URL strategy for duplicate names: `city-name + display-name + random-code` via `public_slug`.
- Admin and subscription extension points are ready in schema and can be expanded with policies and billing.

## Project structure
- `app/Models` domain entities
- `app/Http/Controllers` module controllers
- `database/migrations` schema
- `database/seeders/DatabaseSeeder.php` sample data
- `resources/views` Blade UI
- `routes/web.php` application routes

## Setup
When network access to package registries is available:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Admin panel
- URL: `/admin`
- Middleware: `admin` role check (`EnsureAdmin`)
- Seeded admin user: `admin@clubscope.test` / `password`


## Fix for `Table 'clubscope.cache' doesn't exist` and `View path not found`
If you see those errors, use these steps:

```bash
cp .env.example .env
php artisan config:clear
php artisan cache:clear
php artisan migrate
```

Notes:
- This repo now defaults to `CACHE_STORE=file` and `SESSION_DRIVER=file`, so Laravel will not require a DB `cache` table for normal development.
- If you intentionally want database cache, keep `CACHE_STORE=database` and run migrations (includes `cache` and `cache_locks` tables).
- `VIEW_COMPILED_PATH` is configured to `storage/framework/views`; ensure the `storage/framework/views` directory exists and is writable.


## Fix for `file_put_contents(...storage/framework/sessions/...): Failed to open stream`
This means Laravel cannot find/write the session directory.

Create required folders:

```bash
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache/data bootstrap/cache
```

Then clear cached config and retry:

```bash
php artisan optimize:clear
```

On Windows/XAMPP, also make sure the `storage/` and `bootstrap/cache` folders are writable by Apache/PHP.
