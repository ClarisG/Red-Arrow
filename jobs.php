<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';
$page_title = 'Jobs — ' . SITE_TITLE;
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/config/db.php';

// Kunin ang lahat ng active jobs
$jobs = $pdo->query("SELECT * FROM jobs WHERE is_active = 1 ORDER BY posted_at DESC")->fetchAll();

// Kunin unique countries/fields para sa dropdowns
$countries = $pdo->query("SELECT DISTINCT country FROM jobs WHERE is_active = 1 ORDER BY country")->fetchAll(PDO::FETCH_COLUMN);
$fields = $pdo->query("SELECT DISTINCT field FROM jobs WHERE is_active = 1 AND field IS NOT NULL ORDER BY field")->fetchAll(PDO::FETCH_COLUMN);
?>

<section class="hero">
  <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1600&q=85" alt="Global job opportunities">
  <div class="hero-shade"></div>
  <div class="container hero-copy">
    <p class="eyebrow" style="color:#ff8896;">FIND YOUR NEXT OPPORTUNITY</p>
    <h1>Better Jobs.<br><span class="accent">Brighter Futures.</span></h1>
    <p>Red Arrow connects talented people with great companies.<br>Search from thousands of jobs and take the next step in your career.</p>
  </div>
</section>

<div class="container floating-search">
  <div class="search-bar">
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><path d="M21 21l-4.3-4.3M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/></svg>
      <input type="text" id="jobsSearch" placeholder="Job title, skill, or keyword">
    </label>
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><path d="M12 22s8-4.5 8-11a8 8 0 1 0-16 0c0 6.5 8 11 8 11z"/><circle cx="12" cy="11" r="3"/></svg>
      <select id="jobsCountry">
        <option value="">All Countries</option>
        <?php foreach ($countries as $c): ?>
          <option value="<?= e($c) ?>"><?= e($c) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
      <select id="jobsField">
        <option value="">All Fields</option>
        <?php foreach ($fields as $f): ?>
          <option value="<?= e($f) ?>"><?= e($f) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="eyebrow">FEATURED JOB OPPORTUNITIES</p>
      <h2>Jobs We're Hiring For</h2>
      <p id="jobsCount"><?= count($jobs) ?> jobs</p>
    </div>

    <div class="job-grid">
      <?php foreach ($jobs as $j): ?>
        <article class="job-card"
                 data-job-card
                 data-title="<?= e($j['title']) ?>"
                 data-country="<?= e($j['country']) ?>"
                 data-field="<?= e($j['field']) ?>">

          <div class="job-image">
            <img src="<?= e($j['image_url'] ?: 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800') ?>" alt="<?= e($j['title']) ?>">
            <span class="job-flag"><?= e($j['country']) ?></span>
          </div>

          <div class="job-content">
            <h3><?= e($j['title']) ?></h3>
            <p class="job-company">Bound to <?= e($j['country']) ?></p>
            <ul class="job-meta">
              <li>📁 <?= e($j['field'] ?: 'General') ?></li>
              <li>💰 <?= format_salary((int)$j['salary_min'], (int)$j['salary_max'], $j['salary_currency']) ?> / month</li>
              <li>⏱️ <?= e($j['experience'] ?: 'Experience preferred') ?></li>
            </ul>
            <a href="job-details.php?id=<?= (int)$j['id'] ?>" class="pill">View Details <span class="arrow">→</span></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div id="jobsEmpty" class="hidden text-center py-16" style="display: none;">
      <p class="text-4xl mb-4">🔍</p>
      <h3 class="text-xl font-bold mb-2">No jobs match your search</h3>
      <p class="text-muted">Try another keyword or clear your filters.</p>
    </div>
  </div>
</section>

<script src="assets/js/jobs-filter.js"></script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>