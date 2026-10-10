<?php
session_start();
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';

require_login();

require_once __DIR__ . '/config/db.php';

// Kunin applications ng user
$stmt = $pdo->prepare("
    SELECT a.*, j.title AS job_title, j.country, j.company
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    WHERE a.user_id = ?
    ORDER BY a.applied_at DESC
");
$stmt->execute([$_SESSION['user_id']]);
$applications = $stmt->fetchAll();

$page_title = 'My Portal — ' . SITE_TITLE;
require_once __DIR__ . '/includes/header.php';
?>

<section class="soft-section py-12">
  <div class="container">
    <p class="eyebrow">EMPLOYEE PORTAL</p>
    <h1 class="text-4xl font-extrabold mb-2">Welcome back, <?= e(explode(' ', $_SESSION['user_name'])[0]) ?>.</h1>
    <p class="text-muted">Track your applications and discover new opportunities.</p>
  </div>
</section>

<section class="section">
  <div class="container">

    <?php if (empty($applications)): ?>
      <div class="bg-white rounded-2xl p-12 text-center shadow-lg">
        <p class="text-5xl mb-4">📭</p>
        <h3 class="text-xl font-bold mb-2">Wala ka pang applications</h3>
        <p class="text-muted mb-6">Start browsing jobs and submit your first application.</p>
        <a href="jobs.php" class="pill">Browse Jobs →</a>
      </div>
    <?php else: ?>
      <h2 class="text-2xl font-bold mb-5">Your Applications (<?= count($applications) ?>)</h2>

      <div class="space-y-4">
        <?php foreach ($applications as $app): ?>
          <article class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-wrap justify-between gap-4">
            <div>
              <h3 class="text-lg font-bold"><?= e($app['job_title']) ?></h3>
              <p class="text-muted text-sm"><?= e($app['company']) ?> · <?= e($app['country']) ?></p>
              <p class="text-xs text-muted mt-2">
                Applied: <?= date('M d, Y', strtotime($app['applied_at'])) ?>
              </p>
            </div>
            <div class="flex items-center gap-3">
              <?php
                $statusColors = [
                  'pending'     => 'bg-yellow-100 text-yellow-800',
                  'review'      => 'bg-blue-100 text-blue-800',
                  'shortlisted' => 'bg-purple-100 text-purple-800',
                  'rejected'    => 'bg-red-100 text-red-800',
                  'hired'       => 'bg-green-100 text-green-800',
                ];
                $status = $app['status'];
              ?>
              <span class="<?= $statusColors[$status] ?> px-3 py-1 rounded-full text-xs font-bold uppercase">
                <?= e($status) ?>
              </span>
              <a href="job-details.php?id=<?= (int)$app['job_id'] ?>" class="text-brand text-sm font-bold hover:underline">View →</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>