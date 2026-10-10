<?php
require 'config/db.php';
$hash = password_hash('admin123', PASSWORD_DEFAULT);
$pdo->exec("UPDATE users SET password_hash = '$hash' WHERE email = 'admin@redarrow.com'");
echo "✅ Admin password set to: admin123";