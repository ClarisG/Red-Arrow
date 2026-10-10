<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';
$page_title = 'Terms & Conditions — ' . SITE_TITLE;
require_once __DIR__ . '/includes/header.php';
?>

<section class="soft-section py-12">
  <div class="container">
    <p class="eyebrow">TERMS & CONDITIONS</p>
    <h1 class="text-4xl font-extrabold mb-3">Requirements & Guidelines</h1>
    <p class="text-muted max-w-2xl">These document requirements and recruitment conditions help protect applicants and support a safe, transparent overseas application process.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="text-2xl font-bold mb-6">Essential Documents</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php
        $docs = [
          ['Passport',     'Valid passport — genuine and with sufficient validity.'],
          ['CV / Resume',  'Updated CV highlighting your experience and skills.'],
          ['Certificate',  'Employment certificates from previous employers.'],
          ['Training',     'Training and seminar certificates.'],
          ['NBI Clearance','Must be valid and up to date.'],
          ['2x2 Photos',   'Recent photos with clear background.'],
        ];
        foreach ($docs as [$title, $desc]): ?>
          <article class="bg-white border border-gray-200 rounded-xl p-6">
            <h3 class="font-bold mb-2"><?= e($title) ?></h3>
            <p class="text-sm text-muted"><?= e($desc) ?></p>
          </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section soft-section">
  <div class="container">
    <h2 class="text-2xl font-bold mb-6">Recruitment Process</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <?php
        $steps = [
          ['Apply',            'Submit your application.'],
          ['Pre-Screening',    'We review your documents.'],
          ['Interview',        'Attend scheduled interview.'],
          ['Deployment',       'We coordinate travel and processing.'],
        ];
        foreach ($steps as $i => [$t, $d]): ?>
          <article>
            <span class="icon-bubble mb-3"><b><?= $i + 1 ?></b></span>
            <h3 class="font-bold mt-3 mb-2"><?= e($t) ?></h3>
            <p class="text-sm text-muted"><?= e($d) ?></p>
          </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="bg-brand-soft border-l-4 border-brand p-8 rounded-2xl">
      <h3 class="font-bold text-brand-deep text-xl mb-3">⚠️ No Illegal Recruitment</h3>
      <p class="text-sm text-muted mb-3">Always verify official job postings. Red Arrow clearly states that <b>no fees are collected during application.</b></p>
      <p class="text-sm text-muted">Beware of unauthorized collectors. Report suspicious activity immediately.</p>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>