<?php
require_once __DIR__ . '/auth.php'; require_login();
if(($_POST['csrf'] ?? '') !== ($_SESSION['csrf'] ?? '')) die('Invalid request');
$page = safe_page($_POST['page'] ?? 'index.html', $editable_pages);
$content = $_POST['content'] ?? '';
$file = SITE_ROOT . '/' . $page;
if (!is_dir(BACKUP_DIR)) mkdir(BACKUP_DIR, 0755, true);
if (file_exists($file)) copy($file, BACKUP_DIR . '/' . $page . '.' . date('Ymd-His') . '.bak');
file_put_contents($file, $content, LOCK_EX);
header('Location: index.php?page=' . urlencode($page) . '&saved=1'); exit;
?>
