<?xml version='1.0' encoding='utf-8'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php

  foreach($vars['items'] as $item) {

?>

  <url>
    <loc><?php echo $item->getDisplayURL(); ?></lock>
    <lastmod><?php echo date('r', $item->updated); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>1.0</priority>
  </url>

<?php

  }

?>
</urlset>
