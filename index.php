<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';
$page_title = SITE_TITLE . ' — Building Global Careers';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/config/db.php';

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

<?php require_once __DIR__ . '/includes/footer.php'; ?>