<?php
// Shivansh Engineering Admin Panel configuration
// Default login: sunil.kokate@gmail.com / 130413
// Please change password after first upload by replacing ADMIN_PASSWORD_HASH.
define('ADMIN_USER', 'sunil.kokate@gmail.com');
define('ADMIN_PASSWORD_HASH', '$2y$12$DdLHz3pxC.klsijcNcxgHuY9bcygW.rTjx.IS6r7Hbtux30a2eKLu');
define('SITE_ROOT', realpath(__DIR__ . '/..'));
define('UPLOAD_DIR', SITE_ROOT . '/assets/uploads');
define('BACKUP_DIR', __DIR__ . '/backups');
$editable_pages = ['index.html','about.html','products.html','facilities.html','projects.html','quality.html','gallery.html','contact.html'];
?>
