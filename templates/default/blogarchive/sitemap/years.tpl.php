<?xml version='1.0' encoding='utf-8'?>
<sitemapindex xmlns="https://www.google.com/schemas/sitemap/0.84">
<?php

  foreach($vars['years'] as $year) {

?>

  <sitemap>
    <loc><?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() . 'sitemap/' . $year['year'] . '/sitemap.xml'; ?></loc>
    <lastmod><?php echo date('r', $year['object']->created); ?></lastmod>
  </sitemap>

<?php

  }

?>
</sitemapindex>