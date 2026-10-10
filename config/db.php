<?php
/**
 * RedArrow — Database Connection (PDO)
 *
 * Troubleshooting:
 *  - Kung "connection refused": I-start ang MySQL sa XAMPP Control Panel.
 *  - Kung "unknown database": I-import ang sql/database.sql sa phpMyAdmin.
 *  - Kung "access denied": I-check ang $db_user at $db_pass.
 *  - Port: Ang XAMPP mo ay naka-set sa 3307 (base sa my.ini).
 */

require_once __DIR__ . '/constants.php';

// ===== DB Credentials =====
$db_host = 'localhost';
$db_port = '3307';           // Custom XAMPP port (base sa my.ini mo)
$db_name = 'redarrow_db';
$db_user = 'root';
$db_pass = '';               // XAMPP default: BLANK (walang password)

// ===== Timezone (Asia/Manila) =====
date_default_timezone_set('Asia/Manila');

// ===== Build DSN =====
$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";

// ===== PDO Options =====
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
];

// ===== Connect =====
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {

    // ===== Development mode: detailed error =====
    if (APP_ENV === 'development') {

        $code = $e->getCode();
        $msg  = $e->getMessage();

        // Friendly troubleshooting hints
        $hint = '';

        if (str_contains($msg, '2002') || str_contains($msg, 'refused')) {
            $hint = "Hindi naka-start ang MySQL o mali ang port. I-check ang XAMPP Control Panel at siguraduhing tumatakbo ang MySQL sa port {$db_port}.";
        } elseif (str_contains($msg, '1049') || str_contains($msg, 'Unknown database')) {
            $hint = "Wala pang database na '{$db_name}'. Pumunta sa http://localhost/phpmyadmin, i-click ang Import, at piliin ang sql/database.sql.";
        } elseif (str_contains($msg, '1045') || str_contains($msg, 'Access denied')) {
            $hint = "Mali ang username o password. Sa XAMPP default: user = 'root', password = '' (blank).";
        } elseif (str_contains($msg, '2003')) {
            $hint = "Hindi ma-reach ang MySQL server. I-check kung tumatakbo ang MySQL at tama ang port ({$db_port}).";
        }

        echo '<div style="font-family:monospace;background:#fff4f5;border-inline-start:6px solid #ed001c;padding:20px;margin:20px;border-radius:8px;">';
        echo '<h2 style="color:#93000f;margin:0 0 10px;">&#9888;&#65039; Database Connection Failed</h2>';
        echo '<p style="margin:0 0 10px;color:#111820;"><b>Error Code:</b> ' . htmlspecialchars((string)$code) . '</p>';
        echo '<p style="margin:0 0 10px;color:#111820;"><b>Message:</b> ' . htmlspecialchars($msg) . '</p>';

        if ($hint) {
            echo '<p style="margin:0 0 10px;color:#93000f;background:#fff;padding:10px;border-radius:6px;"><b>Solusyon:</b> ' . htmlspecialchars($hint) . '</p>';
        }

        echo '<p style="margin:0;color:#61707b;font-size:12px;">I-check ang config/db.php kung tama ang host, port, database name, user, at password.</p>';
        echo '</div>';

        exit;
    }

    // ===== Production mode: generic error =====
    die('Service temporarily unavailable. Please try again later.');
}