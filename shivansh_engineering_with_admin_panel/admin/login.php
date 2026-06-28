<?php
require_once __DIR__ . '/auth.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  if ($email === ADMIN_USER && password_verify($password, ADMIN_PASSWORD_HASH)) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
    header('Location: index.php'); exit;
  }
  $error = 'Invalid email or password';
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Login</title><link rel="stylesheet" href="style.css"></head>
<body class="login-body"><form class="login-card" method="post"><h1>Shivansh Admin</h1><p>Website content editor</p><?php if($error): ?><div class="alert"><?=h($error)?></div><?php endif; ?><label>Email</label><input name="email" type="email" required value="sunil.kokate@gmail.com"><label>Password</label><input name="password" type="password" required><button type="submit">Login</button></form></body></html>
