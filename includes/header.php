<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? SITE_TITLE ?></title>
  
  <!-- ===== FAVICON / TAB LOGO ===== -->
  <link rel="icon" type="image/png" href="img/red-arrow-logo.png">
  <link rel="shortcut icon" type="image/png" href="img/red-arrow-logo.png">
  <link rel="apple-touch-icon" href="img/red-arrow-logo.png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a href="index.php" class="brand">
      <img src="img/red-arrow-logo.png" 
           alt="Red Arrow Logo" 
           class="brand-logo" 
           onerror="this.src='https://via.placeholder.com/50x50/ed001c/ffffff?text=RA'">
      <div class="brand-text">
        <span class="header-brand-title">RED ARROW</span>
        <span class="header-brand-text">INT’L EMPLOYMENT INC.</span>
      </div>
    </a>

    <nav class="main-nav">
      <a href="index.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a>
      <a href="jobs.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'jobs.php' ? 'active' : '' ?>">Jobs</a>
      <!-- Contact Us removed as requested, it is now in About Us -->
      <a href="about.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About Us</a>
    </nav>

    <div class="header-actions">
      <a href="auth/login.php" class="pill header-pill">Sign In →</a>
    </div>
  </div>
</header>