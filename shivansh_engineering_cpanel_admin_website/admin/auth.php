<?php
session_start();
define('ROOT', dirname(__DIR__));
function require_login(){ if(empty($_SESSION['admin'])){ header('Location: login.php'); exit; } }
function users(){ return json_decode(file_get_contents(ROOT.'/data/users.json'), true); }
function content(){ return json_decode(file_get_contents(ROOT.'/data/content.json'), true); }
function save_content($d){ file_put_contents(ROOT.'/data/content.json', json_encode($d, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)); }
function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
