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
