# ClubScope (Planning + UI Prototype)

This repository contains a modern responsive prototype and a Laravel implementation blueprint for your club discovery platform.

## Included
- `prototype/index.html` - mobile-friendly UI concept for Home and primary modules
- `prototype/assets/styles.css` - styles for modern look/feel
- `docs/laravel-build-plan.md` - backend + frontend module architecture and phased Laravel plan

## Run prototype locally
```bash
python3 -m http.server 8080
# open http://localhost:8080/prototype/
```

## Next step when network is available
Create latest Laravel app and wire modules:
```bash
composer create-project laravel/laravel .
```
Then implement migrations, auth, admin panel, search, and subscription flow per `docs/laravel-build-plan.md`.
