<?php
if (session_status() === PHP_SESSION_NONE) session_start();

define('APP_NAME', 'Bharatpur Explore AI');
define('APP_TAGLINE', 'Your Personalized Local Travel Companion');
define('BASE_URL', getenv('APP_BASE_URL') ?: '');

define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_NAME', getenv('DB_NAME') ?: 'bharatpur_explore_ai');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
