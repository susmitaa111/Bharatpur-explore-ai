<<<<<<< HEAD
# Bharatpur-explore-ai
Bharatpur Explore AI is a web-based smart tourism platform designed to help users explore Bharatpur and nearby destinations in a convenient and personalized way. The system brings important travel information into one platform, allowing users to discover places, restaurants, events, homestays, emergency services, and travel experiences.
=======
# Bharatpur Explore AI

**Tagline:** Your Personalized Local Travel Companion

A hackathon-ready PHP/MySQL tourism prototype for Bharatpur, Chitwan. It includes a production-style responsive UI, discovery pages, transparent recommendation scoring, personalized multi-day itineraries, Leaflet/OpenStreetMap, local experiences, demo events, saved items, review sentiment, authentication UI, emergency-information safeguards, multilingual major labels, and an admin dashboard.

## Quick start with XAMPP / WAMP

1. Copy the `bharatpur-explore-ai` folder into `htdocs` (XAMPP) or your web root.
2. Start **Apache**. The public prototype works immediately using its built-in demo dataset.
3. Open `http://localhost/bharatpur-explore-ai/`.
4. Optional MySQL: start MySQL, import `database/schema.sql`, then `database/seed.sql` in phpMyAdmin.
5. Default DB settings are `127.0.0.1`, database `bharatpur_explore_ai`, user `root`, blank password. You can override with environment variables: `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
6. Open `/admin/` to use the dashboard. CRUD activates automatically when MySQL is connected.

## Recommendation logic

The prototype does **not** label static cards as AI. Each destination receives a transparent score:

- Interest match × 40
- Budget match × 20
- Time match × 20
- Group match × 10
- Rating × 10

`api/recommend.php` exposes the same scoring and itinerary builder as JSON, making it easy to connect React, a mobile client, or an LLM that only rewrites the already-selected route into natural language.

## Main pages

- `index.php` — home and innovation story
- `explore.php` — search and category discovery
- `destination.php?id=1` — destination details + mini map + review form
- `plan.php` — six-step trip preference wizard
- `itinerary.php` — personalized result and cost estimate
- `map.php` — full-screen Leaflet map with filters and current-location control
- `experiences.php` — eat/stay/shop/experience local
- `events.php` — demo event discovery
- `saved.php` — browser-local favorites and saved itinerary
- `reviews.php` — sentiment dashboard
- `emergency.php` — safe demo assistance listings; no fabricated official phone numbers
- `login.php`, `register.php` — user authentication (persistent with MySQL; session demo fallback)
- `admin/` — analytics and CRUD manager

## Demo-data safety

This is a prototype. Prices, coordinates, opening/access information, local-business details and event dates are demonstration data unless separately verified. Emergency numbers are intentionally not fabricated.

## Frontend libraries

Bootstrap 5, Font Awesome, Leaflet + OpenStreetMap, Chart.js, Google Fonts. The public UI uses custom CSS for the premium nature-inspired travel design.

## Image credits / prototype use

The UI references free-to-use Unsplash images from Chitwan/Nepal-oriented photo pages for hackathon presentation. Before commercial deployment, keep required attribution practices and review the current Unsplash license/usage terms.
>>>>>>> 55f6519 (Add Bharatpur Explore AI project)
