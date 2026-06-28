<?php
require_once __DIR__ . '/auth.php'; require_login();
$page = safe_page($_GET['page'] ?? 'index.html', $editable_pages);
$file = SITE_ROOT . '/' . $page;
$content = file_exists($file) ? file_get_contents($file) : '';
$images = [];
foreach (glob(SITE_ROOT . '/assets/images/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE) ?: [] as $img) $images[] = 'assets/images/' . basename($img);
foreach (glob(UPLOAD_DIR . '/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE) ?: [] as $img) $images[] = 'assets/uploads/' . basename($img);
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Shivansh Admin Panel</title><link rel="stylesheet" href="style.css"></head><body>
<header class="admin-header"><div><strong>Shivansh Engineering Admin Panel</strong><span>Edit website pages, upload images, and save changes.</span></div><a href="logout.php">Logout</a></header>
<main class="wrap"><aside class="side"><h3>Pages</h3><?php foreach($editable_pages as $p): ?><a class="<?= $p===$page?'active':'' ?>" href="?page=<?=h($p)?>"><?=h($p)?></a><?php endforeach; ?><hr><h3>Uploaded / Existing Images</h3><div class="image-list"><?php foreach($images as $img): ?><div><img src="../<?=h($img)?>"><code><?=h($img)?></code></div><?php endforeach; ?></div></aside>
<section class="panel"><div class="toolbar"><h2>Editing: <?=h($page)?></h2><a class="preview" target="_blank" href="../<?=h($page)?>">Preview Page</a></div>
<div class="help"><b>Tip:</b> Change text directly in the HTML. For image changes, upload photo first, then replace image path like <code>assets/uploads/photo.jpg</code>. Backup is created automatically before every save.</div>
<form method="post" action="save.php"><input type="hidden" name="csrf" value="<?=h($_SESSION['csrf'])?>"><input type="hidden" name="page" value="<?=h($page)?>"><textarea name="content" spellcheck="false"><?=h($content)?></textarea><button type="submit">Save Page</button></form>
<h2>Upload Image</h2><form class="upload" method="post" action="upload.php" enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?=h($_SESSION['csrf'])?>"><input type="file" name="image" accept="image/*" required><button type="submit">Upload Image</button></form>
<h2>Important</h2><p>Admin URL: <code>yourdomain.com/admin/</code>. After uploading to cPanel, change the default password hash in <code>admin/config.php</code>.</p>
</section></main></body></html>
