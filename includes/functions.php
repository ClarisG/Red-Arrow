<?php
/**
 * RedArrow — Helper Functions
 */

/**
 * I-sanitize ang output para maiwasan ang XSS.
 */
function e(?string $str): string {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

/**
 * I-redirect at i-exit.
 */
function redirect(string $url): void {
    header("Location: $url");
    exit;
}

/**
 * Mag-set ng flash message (one-time notification).
 */
function set_flash(string $type, string $message): void {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

/**
 * Kunin at burahin ang flash message.
 */
function get_flash(): ?array {
    if (empty($_SESSION['flash'])) return null;
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

/**
 * I-render ang flash message HTML.
 */
function render_flash(): string {
    $flash = get_flash();
    if (!$flash) return '';
    $color = $flash['type'] === 'success' ? 'green' : ($flash['type'] === 'error' ? 'red' : 'blue');
    return '<div data-flash class="container mt-4"><div class="bg-' . $color . '-50 border-l-4 border-' . $color . '-500 text-' . $color . '-800 p-4 rounded">'
         . e($flash['message']) . '</div></div>';
}

/**
 * Siguraduhing naka-login ang user, kung hindi, i-redirect sa login.
 */
function require_login(string $redirect_back = ''): void {
    if (empty($_SESSION['user_id'])) {
        $redirect = $redirect_back ? '?redirect=' . urlencode($redirect_back) : '';
        redirect('auth/login.php' . $redirect);
    }
}

/**
 * Siguraduhing admin ang naka-login.
 */
function require_admin(): void {
    if (empty($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
        redirect('../auth/login.php');
    }
}

/**
 * I-format ang salary range.
 */
function format_salary(?int $min, ?int $max, string $currency = 'USD'): string {
    if (!$min && !$max) return 'Negotiable';
    if ($min && $max) return $currency . ' ' . number_format($min) . ' – ' . number_format($max);
    return $currency . ' ' . number_format($min ?: $max);
}

/**
 * I-check kung PDF file ang na-upload.
 */
function is_valid_pdf(array $file): bool {
    if ($file['error'] !== UPLOAD_ERR_OK) return false;
    if ($file['size'] > MAX_UPLOAD_MB * 1024 * 1024) return false;
    $mime = mime_content_type($file['tmp_name']);
    return $mime === 'application/pdf';
}