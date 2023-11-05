<?xml version='1.0' encoding='utf-8'?>
<sitemapindex xmlns="https://www.google.com/schemas/sitemap/0.84">
<?php

  foreach($vars['months'] as $month) {

?>

  <sitemap>
    <loc><?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() . 'sitemap/' . $month['year'] . '/' . $month['month'] . '/sitemap.xml'; ?></loc>
    <lastmod><?php echo date('r', $month['object']->created); ?></lastmod>
  </sitemap>

<?php

  }

?>
</sitemapindex>