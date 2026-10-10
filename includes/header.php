<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/constants.php';

// Active page detection
$current = basename($_SERVER['PHP_SELF']);
$page_title = $page_title ?? SITE_TITLE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: { DEFAULT: '#ed001c', deep: '#93000f', soft: '#fff4f5' },
            ink:   '#111820',
            muted: '#61707b',
          },
          fontFamily: { sans: ['Manrope', 'system-ui', 'sans-serif'] },
        },
      },
    };
  </script>

  <!-- Manrope font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Favicon (logo) -->
  <link rel="icon" type="image/png" href="<?= LOGO_PATH ?>">
</head>
<body class="font-sans text-ink bg-white">

<!-- ==================================================
     HEADER — Home · Jobs · About Us · Contact · Sign In
     ================================================== -->
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-gray-200">
  <div class="container flex items-center justify-between h-[80px] gap-6">

    <!-- Logo + Brand -->
    <a href="index.php" class="flex items-center gap-3 shrink-0">
      <img src="<?= LOGO_PATH ?>" alt="Red Arrow" class="h-12 w-auto">
      <div class="leading-none hidden sm:block">
        <b class="block text-lg font-extrabold tracking-tight text-brand">RED ARROW</b>
        <small class="block text-[8px] font-bold tracking-[2px] text-ink/70 mt-1">RECRUITMENT AGENCY</small>
      </div>
    </a>

    <!-- Desktop nav -->
    <nav class="hidden lg:flex items-center gap-8 flex-1 justify-center">
      <a href="index.php"     class="nav-link <?= $current === 'index.php'     ? 'active' : '' ?>">Home</a>
      <a href="jobs.php"      class="nav-link <?= $current === 'jobs.php'      ? 'active' : '' ?>">Jobs</a>
      <a href="about.php"     class="nav-link <?= $current === 'about.php'     ? 'active' : '' ?>">About Us</a>
      <a href="contact.php"   class="nav-link <?= $current === 'contact.php'   ? 'active' : '' ?>">Contact</a>
    </nav>

    <!-- Sign In / Portal -->
    <div class="hidden lg:block">
      <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="<?= $_SESSION['role'] === 'admin' ? 'admin/dashboard.php' : 'dashboard.php' ?>"
           class="inline-block bg-brand hover:bg-brand-deep text-white text-xs font-bold px-6 py-3 rounded-full transition shadow-lg shadow-brand/20">
          My Portal <span class="ml-1">→</span>
        </a>
      <?php else: ?>
        <a href="auth/login.php"
           class="inline-block bg-brand hover:bg-brand-deep text-white text-xs font-bold px-6 py-3 rounded-full transition shadow-lg shadow-brand/20">
          Sign In <span class="ml-1">→</span>
        </a>
      <?php endif; ?>
    </div>

    <!-- Mobile menu button -->
    <button id="menuToggle" class="lg:hidden w-9 h-8 flex flex-col justify-center gap-1.5" aria-label="Toggle menu">
      <span class="block h-0.5 bg-ink"></span>
      <span class="block h-0.5 bg-ink"></span>
      <span class="block h-0.5 bg-ink"></span>
    </button>
  </div>

  <!-- Mobile nav -->
  <nav id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-200 px-5 py-4 space-y-1">
    <a href="index.php"   class="block py-3 font-bold border-b border-gray-100">Home</a>
    <a href="jobs.php"    class="block py-3 font-bold border-b border-gray-100">Jobs</a>
    <a href="about.php"   class="block py-3 font-bold border-b border-gray-100">About Us</a>
    <a href="contact.php" class="block py-3 font-bold border-b border-gray-100">Contact</a>
    <?php if (!empty($_SESSION['user_id'])): ?>
      <a href="<?= $_SESSION['role'] === 'admin' ? 'admin/dashboard.php' : 'dashboard.php' ?>"
         class="block text-center bg-brand text-white font-bold py-3 rounded-full mt-3">My Portal</a>
    <?php else: ?>
      <a href="auth/login.php"
         class="block text-center bg-brand text-white font-bold py-3 rounded-full mt-3">Sign In</a>
    <?php endif; ?>
  </nav>
</header>

<main>