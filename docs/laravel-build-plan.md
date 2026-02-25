# ClubScope Laravel Build Plan (Latest Laravel)

## 1) Product Modules (from your requirements)
- Home
- Search clubs by location/name
- Club profile pages (overview, timings, gallery, location, reviews, unique username)
- Register/List club
- Coaches/Academies (same structure as club)
- Resources (YouTube + external product links)
- Tournaments (club-linked, registration details, winners)
- Hall of Fame (top players, Indian top players)
- User registration (Player / Coach / both) with portfolio page
- News & Events
- Banner management (sponsored placement)
- Optional Threads (forum-like)
- Static pages (About, Contact, Terms, Policy)
- Free/Paid subscriptions

## 2) Suggested Tech Stack
- Laravel 12 (latest major)
- MySQL 8+
- Redis (cache + queues)
- Laravel Breeze/Jetstream for auth starter
- Laravel Scout + Meilisearch (fast location/name search)
- Spatie Media Library (gallery)
- Spatie Permission (roles: Admin, ClubOwner, Coach, Player)
- Cashier or Razorpay integration for subscriptions/payments

## 3) Username / Slug strategy for duplicate club names
Use immutable public handle:
- `city-slug + brand-slug + short-unique-code`
- Example: `smash-arena-bengaluru-a3f9`
Store both:
- `display_name` (human friendly, duplicates allowed)
- `public_slug` (unique, used in URL)

## 4) Core data model (high-level)
- users
- clubs
- coaches
- player_profiles
- tournaments
- tournament_winners
- galleries / media
- reviews
- resources
- news_events
- banners
- subscriptions
- hall_of_fame_entries
- threads (optional)

## 5) Admin Panel Scope
- User moderation + roles
- Approve/reject club listings
- Review moderation
- Banner approval + scheduling
- Tournament approvals and winner publishing
- Content management (news/resources/static pages)

## 6) Delivery Phases
### Phase 1 (MVP)
- Home, search, club/coach profiles, player registration/profile
- Tournaments, hall of fame, news/events
- Admin panel + banner mgmt + static pages

### Phase 2
- Forum/threads
- In-app commerce marketplace for accessories
- Advanced analytics and recommendation feeds

## 7) Performance and UX
- Mobile-first UI
- Server-side caching for listing/search pages
- Lazy-loaded media and compressed images
- Queue processing for uploads and moderation

## 8) Current environment note
This repository currently has no Laravel skeleton and package download is blocked from Packagist in this environment, so this commit includes:
- a responsive front-end prototype (`prototype/`)
- implementation architecture documentation (`docs/`)
Once network access to Composer/Packagist is available, we can generate a full Laravel 12 app and map this plan to migrations/controllers/views.
