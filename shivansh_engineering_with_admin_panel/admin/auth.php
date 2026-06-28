<?php
require_once __DIR__ . '/config.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }
function is_logged_in(){ return !empty($_SESSION['admin_logged_in']); }
function require_login(){ if(!is_logged_in()){ header('Location: login.php'); exit; } }
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function safe_page($page, $editable_pages){ return in_array($page, $editable_pages, true) ? $page : $editable_pages[0]; }
?>
