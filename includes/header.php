<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
$pageTitle = $pageTitle ?? APP_NAME;
$current = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="AI-assisted Bharatpur tourism discovery and itinerary prototype.">
  <title><?= h($pageTitle) ?> | <?= APP_NAME ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="appToast" class="toast align-items-center text-bg-dark border-0 position-fixed top-0 end-0 m-3" role="alert" style="z-index:2000"><div class="d-flex"><div class="toast-body">Saved ❤️</div><button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div></div>
<nav class="navbar navbar-expand-lg sticky-top glass-nav">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php"><span class="brand-mark"><i class="fa-solid fa-location-dot"></i></span><span><strong>Bharatpur Explore</strong><span class="ai-dot"> AI</span><small class="d-block">Discover Bharatpur Your Way</small></span></a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
        <li class="nav-item"><a class="nav-link" data-i18n="Home" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="Explore" href="explore.php">Explore</a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="Map" href="map.php">Map</a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="Local Experiences" href="experiences.php">Local Experiences</a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="Events" href="events.php">Events</a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="About" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        <li class="nav-item"><a class="nav-link" aria-label="Search" href="explore.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-i18n="Saved" href="saved.php"><i class="fa-regular fa-heart"></i></a></li>
        <li class="nav-item"><a class="nav-link" aria-label="Login" href="login.php"><i class="fa-regular fa-user"></i></a></li>
        <li class="nav-item dropdown"><button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-language"></i> <span id="langName">EN</span></button><ul class="dropdown-menu"><li><button class="dropdown-item lang-option" data-lang="en">English</button></li><li><button class="dropdown-item lang-option" data-lang="ne">नेपाली</button></li><li><button class="dropdown-item lang-option" data-lang="hi">हिन्दी</button></li></ul></li>
        <li class="nav-item ms-lg-2"><a class="btn btn-brand" data-i18n="Plan My Trip" href="plan.php"><i class="fa-solid fa-wand-magic-sparkles"></i> Plan My Trip</a></li>
      </ul>
    </div>
  </div>
</nav>
<main>
