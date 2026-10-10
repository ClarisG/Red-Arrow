<?php
session_start();
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

// Kung naka-login na, i-redirect
if (!empty($_SESSION['user_id'])) {
    $redirect = $_GET['redirect'] ?? ($_SESSION['role'] === 'admin' ? '../admin/dashboard.php' : '../dashboard.php');
    redirect($redirect);
}

$error = '';
$redirect = $_GET['redirect'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? $redirect;

    if (!$email || !$pass) {
        $error = 'Please fill in all fields.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($pass, $user['password_hash'])) {
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email']= $user['email'];
            $_SESSION['user_phone']= $user['phone'];
            $_SESSION['role']      = $user['role'];

            // Redirect logic
            if ($user['role'] === 'admin') {
                redirect('../admin/dashboard.php');
            } elseif ($redirect) {
                redirect('../' . $redirect);
            } else {
                redirect('../dashboard.php');
            }
        } else {
            $error = 'Invalid email or password.';
        }
    }
}

$page_title = 'Sign In — ' . SITE_TITLE;
require_once __DIR__ . '/../includes/header.php';
?>

<section class="section soft-section min-h-[70vh] flex items-center">
  <div class="container" style="max-inline-size:480px;">

    <div class="bg-white p-10 rounded-2xl shadow-xl">

      <h1 class="text-3xl font-extrabold text-brand-deep mb-2">Welcome back</h1>
      <p class="text-muted mb-6">Sign in to continue your application.</p>

      <?php if ($error): ?>
        <div class="bg-red-50 text-red-800 border-l-4 border-red-500 p-4 rounded mb-5 text-sm">
          <?= e($error) ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="space-y-5">
        <input type="hidden" name="redirect" value="<?= e($redirect) ?>">

        <label class="block">
          <span class="text-xs font-bold text-ink">Email Address</span>
          <input type="email" name="email" required
                 class="mt-2 w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition"
                 placeholder="you@example.com"
                 value="<?= e($_POST['email'] ?? '') ?>">
        </label>

        <label class="block">
          <span class="text-xs font-bold text-ink">Password</span>
          <div class="relative mt-2">
            <input type="password" name="password" id="password" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition"
                   placeholder="Your password">

            <button type="button" data-password-toggle="password"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-brand transition"
                    aria-label="Toggle password visibility">
              <svg class="eye-open icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
              <svg class="eye-closed icon hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
              </svg>
            </button>
          </div>
        </label>

        <button type="submit" class="pill w-full justify-center">
          Sign In <span>→</span>
        </button>
      </form>

      <p class="text-center text-sm text-muted mt-6">
        Don't Have An Account?
        <a href="register.php<?= $redirect ? '?redirect=' . urlencode($redirect) : '' ?>"
           class="text-brand font-bold hover:underline">Register now</a>
      </p>

    </div>
  </div>
</section>

<script src="../assets/js/password-toggle.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>