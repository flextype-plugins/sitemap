<?= '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($pages as $page): ?>
<url>
<loc><?= $page['url'] ?></loc>
<lastmod><?= $page['date'] ?></lastmod>
<changefreq><?= $page['changefreq'] ?? '1.0' ?></changefreq>
<priority>1.0</priority>
</url>
<?php endforeach ?>
</urlset>
