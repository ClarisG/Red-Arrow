<?php
require_once __DIR__ . '/config/constants.php';
<<<<<<< HEAD
require_once __DIR__ . '/includes/functions.php';
=======
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
$page_title = SITE_TITLE . ' — Building Global Careers';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/config/db.php';

<<<<<<< HEAD
// Featured jobs
$featured = $pdo->query("SELECT * FROM jobs WHERE is_active=1 ORDER BY posted_at DESC LIMIT 4")->fetchAll();
?>

<!-- HERO -->
<section class="hero-home">
  <div class="hero-home-bg"></div>
  <div class="hero-home-overlay"></div>
  <div class="hero-home-circle"></div>

  <div class="container hero-home-copy">
    <p class="eyebrow" style="color:#fff; letter-spacing:3px;">PEOPLE &nbsp;·&nbsp; OPPORTUNITIES &nbsp;·&nbsp; PROGRESS</p>
    <h1>
      Building global careers.<br>
      <span>Empowering Filipino talent.</span>
    </h1>
    <p>
      Trusted recruitment support for applicants and employers,
      from first conversation to successful deployment.
    </p>
    <a href="about.php" class="pill pill-shine">Discover Our Story <span>→</span></a>
  </div>
</section>

<!-- HOW IT WORKS (Animated) -->
<section class="soft-section">
  <div class="container">
    <div class="split-process">

      <div>
        <p class="eyebrow">HOW IT WORKS</p>
        <h2 style="font-size:38px; font-weight:800; letter-spacing:-1.5px; margin:6px 0 16px; line-height:1.15;">
          Your Goals. Our Priority.
        </h2>
        <p style="color:#61707b; font-size:14px; max-inline-size:400px; line-height:1.7;">
          Whether you're looking for your next career move or the perfect
          addition to your team, we make recruitment simple, efficient, and stress-free.
        </p>
        <a href="auth/login.php" class="pill pill-shine" style="margin-block-start:22px;">Get Started <span>→</span></a>
      </div>

      <div class="process process-4">
        <article>
          <b>1</b>
          <span class="icon-bubble">
            <svg class="icon" viewBox="0 0 24 24"><path d="M6 2h9l4 4v16H6zM14 2v5h5M9 12h6M9 16h6"/></svg>
          </span>
          <h3>Apply</h3>
          <p>Submit your application and complete the required forms.</p>
        </article>
        <article>
          <b>2</b>
          <span class="icon-bubble">
            <svg class="icon" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
          </span>
          <h3>Pre-Screening</h3>
          <p>We review your documents and match your qualifications.</p>
        </article>
        <article>
          <b>3</b>
          <span class="icon-bubble">
            <svg class="icon" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="8" r="3"/><path d="M2 20c0-4 2-7 7-7s7 3 7 7M14 14c1-1 2-1 4-1 4 0 6 3 6 7"/></svg>
          </span>
          <h3>Interview &amp; Assessment</h3>
          <p>Attend the scheduled interview and assessment.</p>
        </article>
        <article>
          <b>4</b>
          <span class="icon-bubble">
            <svg class="icon" viewBox="0 0 24 24"><path d="M6 2h9l4 4v16H6zM14 2v5h5M9 12h6M9 16h6"/></svg>
          </span>
          <h3>Documentation</h3>
          <p>Complete all official paperwork and requirements.</p>
        </article>
      </div>

    </div>
  </div>
</section>

<!-- STATS BAND (Center text, Image on Right) -->
<section class="stats">
  <div class="container stats-grid">
    <div class="stats-text">
      <h2>"Talent moves<br>businesses forward."</h2>
      <p>We don't just fill positions — we build better tomorrows.</p>
    </div>
    <div class="stats-image">
      <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Red Arrow Team">
    </div>
  </div>
</section>

<!-- AI ASSISTANT -->
<div class="ai-assistant" id="aiAssistant">
  <div class="ai-window" id="aiWindow">
    <header class="ai-header">
      <div>
        <b>AI Red Arrow</b>
        <small>Recruitment guide</small>
      </div>
      <button type="button" class="ai-close" id="aiClose" aria-label="Close chat">×</button>
    </header>

    <div class="ai-messages" id="aiMessages">
      <p class="ai-msg ai-bot">
        Kumusta! Ako si <b>AI Red Arrow</b>. Maaari mo akong tanungin tungkol sa:
        <br>• Available jobs
        <br>• Requirements at documents
        <br>• Application process
        <br>• Contact at office details
      </p>
    </div>

    <div class="ai-quick-actions">
      <button type="button" data-ai-q="Anong jobs ang available?">Available jobs</button>
      <button type="button" data-ai-q="Anong requirements?">Requirements</button>
      <button type="button" data-ai-q="Paano mag-apply?">How to apply</button>
    </div>

    <form class="ai-input-form" id="aiForm">
      <input type="text" id="aiInput" placeholder="Type your question..." autocomplete="off">
      <button type="submit" aria-label="Send">→</button>
    </form>

    <p class="ai-note">AI guidance may not reflect current vacancies.</p>
  </div>

  <button type="button" class="ai-launch" id="aiLaunch" aria-label="Open AI Red Arrow">
    <span class="ai-launch-icon">AI</span>
    <span class="ai-launch-text">Ask AI Red Arrow</span>
  </button>
</div>

=======
// Kunin ang featured jobs
$featured = $pdo->query("SELECT * FROM jobs WHERE is_active=1 ORDER BY posted_at DESC LIMIT 4")->fetchAll();
?>

<!-- ==================================================
     HERO — Home (gaya ng Image 1)
     ================================================== -->
<section class="hero" style="block-size:520px;">
  <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=1600&q=85"
       alt="Professional looking toward new opportunities">
  <div class="hero-shade"></div>

  <div class="container hero-copy">
    <p class="eyebrow" style="color:#fff;">YOUR NEXT OPPORTUNITY</p>
    <h1>Red Arrow<br>Recruitment Agency</h1>
    <p>Connecting talented people with great companies.<br>We help you find the right fit — faster.</p>
    <a href="jobs.php" class="pill">Find Your Next Job <span>→</span></a>
  </div>
</section>

<!-- ==================================================
     SEARCH BAR (floating)
     ================================================== -->
<div class="container floating-search">
  <form class="search-bar" action="jobs.php" method="GET">
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><path d="M21 21l-4.3-4.3M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/></svg>
      <input type="text" name="q" placeholder="Job title, skill, or keyword">
    </label>
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><path d="M12 22s8-4.5 8-11a8 8 0 1 0-16 0c0 6.5 8 11 8 11z"/><circle cx="12" cy="11" r="3"/></svg>
      <select name="country">
        <option value="">Location</option>
        <option>Qatar</option><option>UAE</option><option>Japan</option><option>Korea</option>
      </select>
    </label>
    <label class="search-field">
      <svg class="icon" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
      <select name="field">
        <option value="">Job type</option>
        <option>Healthcare</option><option>Education</option><option>Household Services</option><option>Food &amp; Beverage</option>
      </select>
    </label>
    <button type="submit" class="pill">Search Jobs <span>→</span></button>
  </form>
</div>

<!-- ==================================================
     FEATURE GRID
     ================================================== -->
<section class="section">
  <div class="container feature-grid">
    <article>
      <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="8" r="3"/><path d="M2 20c0-4 2-7 7-7s7 3 7 7M14 14c1-1 2-1 4-1 4 0 6 3 6 7"/></svg></span>
      <h3>For Job Seekers</h3>
      <p>Discover exciting career opportunities and get expert guidance from our team.</p>
      <a href="jobs.php">Explore Jobs →</a>
    </article>
    <article>
      <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><path d="M5 21V5h10v16M15 10h4v11M8 9h4M8 13h4M8 17h4"/><path d="M2 21h20"/></svg></span>
      <h3>For Employers</h3>
      <p>Find the right talent to build a stronger, more successful team.</p>
      <a href="contact.php">Hire Talent →</a>
    </article>
    <article>
      <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/></svg></span>
      <h3>Industry Expertise</h3>
      <p>From IT and healthcare to finance and engineering, we recruit across industries.</p>
      <a href="about.php">Our Sectors →</a>
    </article>
    <article>
      <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Zm-3 10 2 2 4-5"/></svg></span>
      <h3>Personalized Support</h3>
      <p>We're with you at every step — from application to onboarding and beyond.</p>
      <a href="about.php">Learn More →</a>
    </article>
  </div>
</section>

<!-- ==================================================
     HOW IT WORKS
     ================================================== -->
<section class="soft-section">
  <div class="container">
    <div style="max-inline-size:480px; margin-block-end:40px;">
      <p class="eyebrow">HOW IT WORKS</p>
      <h2 style="font-size:32px; font-weight:800; letter-spacing:-1px; margin:0 0 12px;">
        Your Goals. Our Priority.
      </h2>
      <p style="color:var(--muted); font-size:14px;">
        Whether you're looking for your next career move or the perfect addition to your team,
        we make recruitment simple, efficient, and stress-free.
      </p>
      <a href="auth/login.php" class="pill" style="margin-block-start:20px;">Get Started <span>→</span></a>
    </div>

    <div class="process">
      <article>
        <b>1</b>
        <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><path d="M6 2h9l4 4v16H6zM14 2v5h5M9 12h6M9 16h6"/></svg></span>
        <h3>Apply or Post</h3>
        <p>Share your goals or open roles with us.</p>
      </article>
      <article>
        <b>2</b>
        <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg></span>
        <h3>Screen &amp; Match</h3>
        <p>We find the best candidates or opportunities for you.</p>
      </article>
      <article>
        <b>3</b>
        <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 11h18"/></svg></span>
        <h3>Interview &amp; Hire</h3>
        <p>You make the right choice. We handle the rest.</p>
      </article>
      <article>
        <b>4</b>
        <span class="icon-bubble"><svg class="icon" viewBox="0 0 24 24"><path d="m2 16 20-9-7 14-3-7-10 2Zm10-2-3-3"/></svg></span>
        <h3>Deployment</h3>
        <p>Get ready for your new journey abroad.</p>
      </article>
    </div>
  </div>
</section>

<!-- ==================================================
     FEATURED JOBS
     ================================================== -->
<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="eyebrow">FEATURED JOBS</p>
      <h2>Top Opportunities</h2>
      <p>Explore our latest job openings and find the perfect role for your skills and goals.</p>
    </div>

    <div class="job-grid">
      <?php foreach ($featured as $j): ?>
        <article class="job-card">
          <div class="job-image">
            <img src="<?= htmlspecialchars($j['image_url'] ?: 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800') ?>"
                 alt="<?= htmlspecialchars($j['title']) ?>">
            <span class="job-flag"><?= htmlspecialchars($j['country']) ?></span>
          </div>
          <div class="job-content">
            <h3><?= htmlspecialchars($j['title']) ?></h3>
            <p class="job-company"><?= htmlspecialchars($j['company']) ?></p>
            <ul class="job-meta">
              <li>📁 <?= htmlspecialchars($j['field']) ?></li>
              <li>💰 <?= htmlspecialchars($j['salary_currency']) ?> <?= number_format((int)$j['salary_min']) ?> – <?= number_format((int)$j['salary_max']) ?> / month</li>
              <li>📍 <?= htmlspecialchars($j['location']) ?></li>
            </ul>
            <a href="job-details.php?id=<?= (int)$j['id'] ?>" class="pill">View Details →</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================================================
     STATS BAND
     ================================================== -->
<section class="stats">
  <div class="container stats-grid">
    <div>
      <p class="eyebrow" style="color:#ff8896;">WHY CHOOSE RED ARROW</p>
      <h2>"Talent moves<br>businesses forward."</h2>
      <p>At Red Arrow, we don't just fill positions — we build better tomorrows.</p>
    </div>
    <div>
      <span class="stat-number"><?= STAT_PLACEMENTS ?></span>
      <span class="stat-label">Successful Placements</span>
    </div>
    <div>
      <span class="stat-number"><?= STAT_COMPANIES ?></span>
      <span class="stat-label">Trusted Companies</span>
      <span class="stat-number" style="margin-block-start:24px;"><?= STAT_SATISFACTION ?></span>
      <span class="stat-label">Candidate Satisfaction</span>
    </div>
  </div>
</section>

>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
<?php require_once __DIR__ . '/includes/footer.php'; ?>