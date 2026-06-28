<?php require 'includes.php'; $d=content_data(); $s=$d['site']; header_html('Home - '.$s['company']); ?>
<section class="hero"><div class="container hero-content"><h1><?=h($s['hero_title'])?></h1><p><?=h($s['hero_text'])?></p><a class="btn" href="contact.php">Request a Quote</a></div></section>
<section class="section"><div class="container"><h2><?=h($s['tagline'])?></h2><p><?=h($s['about'])?></p><div class="stats"><div><b><?=h($s['projects_count'])?></b><span>Projects</span></div><div><b><?=h($s['facility_area'])?></b><span>Facility</span></div><div><b><?=h($s['employees'])?></b><span>Employees</span></div></div></div></section>
<section class="section light"><div class="container"><h2>Our Products</h2><div class="cards"><?php foreach($d['products'] as $p): ?><div class="card"><h3><?=h($p['name'])?></h3><p><?=h($p['text'])?></p></div><?php endforeach; ?></div></div></section>
<?php footer_html(); ?>
