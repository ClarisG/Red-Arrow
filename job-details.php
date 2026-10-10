<?php
session_start();
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/config/db.php';

// Kunin job
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ? AND is_active = 1");
$stmt->execute([$id]);
$job = $stmt->fetch();

if (!$job) {
    $page_title = 'Job Not Found — ' . SITE_TITLE;
    require_once __DIR__ . '/includes/header.php';
    echo '<section class="section container text-center py-20"><h1 class="text-3xl font-bold">Job Not Found</h1><p class="mt-4 text-muted">The job you are looking for is not available.</p><a href="jobs.php" class="pill mt-6">Browse All Jobs →</a></section>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$error = '';
$success = '';

// Handle application submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kailangan naka-login
    if (empty($_SESSION['user_id'])) {
        redirect('auth/login.php?redirect=' . urlencode('job-details.php?id=' . $id));
    }

    $full_name = trim($_POST['full_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $gender    = $_POST['gender'] ?? '';
    $preferred = trim($_POST['preferred_position'] ?? '');
    $dest      = trim($_POST['destination'] ?? '');

    // Validation
    if (!$full_name || !$email || !$phone || !$gender) {
        $error = 'Please fill in all required fields.';
    } elseif (!isset($_FILES['resume']) || !is_valid_pdf($_FILES['resume'])) {
        $error = 'Please upload a valid PDF file (max ' . MAX_UPLOAD_MB . ' MB).';
    } else {
        // Save upload
        if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);

        $filename = 'cv_' . $_SESSION['user_id'] . '_' . time() . '.pdf';
        $target   = UPLOAD_DIR . $filename;

        if (move_uploaded_file($_FILES['resume']['tmp_name'], $target)) {
            $stmt = $pdo->prepare("
                INSERT INTO applications
                (job_id, user_id, full_name, email, phone, gender, preferred_position, destination, resume_path)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $id, $_SESSION['user_id'], $full_name, $email, $phone,
                $gender, $preferred, $dest, UPLOAD_URL . $filename
            ]);

            $success = 'Application submitted successfully! We will contact you soon.';
        } else {
            $error = 'Could not save your file. Please try again.';
        }
    }
}

$page_title = $job['title'] . ' — ' . SITE_TITLE;
require_once __DIR__ . '/includes/header.php';
?>

<!-- ==================================================
     JOB HEADER
     ================================================== -->
<section class="soft-section">
  <div class="container">
    <a href="jobs.php" class="text-brand text-sm font-bold hover:underline">← Back to Jobs</a>
    <h1 class="text-4xl font-extrabold mt-4 mb-3"><?= e($job['title']) ?></h1>
    <p class="text-lg text-muted"><?= e($job['company']) ?> · <?= e($job['location']) ?>, <?= e($job['country']) ?></p>

    <div class="flex flex-wrap gap-3 mt-6">
      <span class="bg-white border border-gray-200 rounded-full px-4 py-2 text-xs font-bold">📁 <?= e($job['field']) ?></span>
      <span class="bg-white border border-gray-200 rounded-full px-4 py-2 text-xs font-bold">💰 <?= format_salary((int)$job['salary_min'], (int)$job['salary_max'], $job['salary_currency']) ?> / month</span>
      <span class="bg-white border border-gray-200 rounded-full px-4 py-2 text-xs font-bold">⏱️ <?= e($job['job_type']) ?></span>
    </div>
  </div>
</section>

<!-- ==================================================
     JOB DETAILS + APPLY FORM
     ================================================== -->
<section class="section">
  <div class="container" style="display:grid; grid-template-columns:1.4fr 1fr; gap:40px;">

    <!-- inset-inline-start: Description -->
    <div>
      <h2 class="text-2xl font-bold mb-4">Job Description</h2>
      <p class="text-muted leading-relaxed"><?= nl2br(e($job['description'])) ?></p>

      <?php if ($job['requirements']): ?>
        <h3 class="text-xl font-bold mt-10 mb-3">Requirements</h3>
        <p class="text-muted leading-relaxed"><?= nl2br(e($job['requirements'])) ?></p>
      <?php endif; ?>
    </div>

    <!-- inset-inline-end: Apply Form -->
    <aside>
      <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-lg sticky top-24">

        <?php if ($success): ?>
          <div class="bg-green-50 text-green-800 border-l-4 border-green-500 p-4 rounded mb-4 text-sm">
            ✓ <?= e($success) ?>
          </div>
          <a href="dashboard.php" class="pill w-full justify-center">View My Applications →</a>

        <?php elseif (empty($_SESSION['user_id'])): ?>
          <h3 class="text-xl font-bold mb-2">Apply for this job</h3>
          <p class="text-muted text-sm mb-5">Sign in to apply. Your details will be filled automatically.</p>
          <a href="auth/login.php?redirect=<?= urlencode('job-details.php?id=' . $id) ?>"
             class="pill w-full justify-center">Sign In to Apply →</a>
          <p class="text-center text-xs text-muted mt-4">
            Wala pang account?
            <a href="auth/register.php?redirect=<?= urlencode('job-details.php?id=' . $id) ?>"
               class="text-brand font-bold">Register</a>
          </p>

        <?php else: ?>
          <h3 class="text-xl font-bold mb-4">Apply Now</h3>

          <?php if ($error): ?>
            <div class="bg-red-50 text-red-800 border-l-4 border-red-500 p-4 rounded mb-4 text-sm">
              <?= e($error) ?>
            </div>
          <?php endif; ?>

          <form method="POST" enctype="multipart/form-data" class="space-y-4">

            <label class="block">
              <span class="text-xs font-bold">Full Name *</span>
              <input type="text" name="full_name" required
                     value="<?= e($_SESSION['user_name']) ?>"
                     class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
            </label>

            <label class="block">
              <span class="text-xs font-bold">Email *</span>
              <input type="email" name="email" required
                     value="<?= e($_SESSION['user_email']) ?>"
                     class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
            </label>

            <div class="grid grid-cols-2 gap-3">
              <label class="block">
                <span class="text-xs font-bold">Phone *</span>
                <input type="tel" name="phone" required
                       value="<?= e($_SESSION['user_phone'] ?? '') ?>"
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
              </label>

              <label class="block">
                <span class="text-xs font-bold">Gender *</span>
                <select name="gender" required
                        class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </label>
            </div>

            <label class="block">
              <span class="text-xs font-bold">Preferred Position</span>
              <input type="text" name="preferred_position"
                     value="<?= e($job['title']) ?>"
                     class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
            </label>

            <label class="block">
              <span class="text-xs font-bold">Destination</span>
              <input type="text" name="destination"
                     value="<?= e($job['country']) ?>"
                     class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none">
            </label>

            <label class="block">
              <span class="text-xs font-bold">Upload CV (PDF, max <?= MAX_UPLOAD_MB ?> MB) *</span>
              <input type="file" name="resume" accept=".pdf" required
                     class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:border-brand outline-none file:mr-3 file:bg-brand file:text-white file:border-0 file:rounded-full file:px-4 file:py-1.5 file:text-xs file:font-bold">
            </label>

            <button type="submit" class="pill w-full justify-center">
              Submit Application <span>→</span>
            </button>
          </form>
        <?php endif; ?>

      </div>
    </aside>
  </div>
</section>

<!-- Responsive override -->
<style>
  @media (max-inline-size: 900px) {
    .section > .container[style*="grid-template-columns:1.4fr"] {
      grid-template-columns: 1fr !important;
    }
  }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>