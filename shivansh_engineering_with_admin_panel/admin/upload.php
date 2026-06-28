<?php
require_once __DIR__ . '/auth.php'; require_login();
if(($_POST['csrf'] ?? '') !== ($_SESSION['csrf'] ?? '')) die('Invalid request');
if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) die('Upload failed');
$allowed = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif'];
$type = mime_content_type($_FILES['image']['tmp_name']);
if (!isset($allowed[$type])) die('Only JPG, PNG, WEBP and GIF allowed');
$name = preg_replace('/[^a-zA-Z0-9_-]+/', '-', pathinfo($_FILES['image']['name'], PATHINFO_FILENAME));
$filename = strtolower($name . '-' . time() . '.' . $allowed[$type]);
move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . '/' . $filename);
header('Location: index.php?uploaded=' . urlencode($filename)); exit;
?>
