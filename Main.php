<?php

    namespace IdnoPlugins\BlogArchive;
    use Idno\Common\Plugin;
    use Idno\Core\Idno;

    class Main extends Plugin {

        function registerPages()
        {
            Idno::site()->routes()->addRoute('/archive/?', '\IdnoPlugins\BlogArchive\Pages\Home');
            Idno::site()->routes()->addRoute('/archive/([0-9]+)/?', '\IdnoPlugins\BlogArchive\Pages\Year');
            Idno::site()->routes()->addRoute('/archive/([0-9]+)/([0-9]+)/?', '\IdnoPlugins\BlogArchive\Pages\Month');

            Idno::site()->routes()->addRoute('/sitemap', '\IdnoPlugins\BlogArchive\Pages\Sitemap');
            Idno::site()->routes()->addRoute('/sitemap\.xml', '\IdnoPlugins\BlogArchive\Pages\Sitemap');
            Idno::site()->routes()->addRoute('/sitemap/([0-9]+)/sitemap\.xml', '\IdnoPlugins\BlogArchive\Pages\SitemapYear');
            Idno::site()->routes()->addRoute('/sitemap/([0-9]+)/([0-9]+)/sitemap\.xml', '\IdnoPlugins\BlogArchive\Pages\SitemapMonth');

            \Idno\Core\Idno::site()->template()->prependTemplate('shell/toolbar/links', 'blogarchive/toolbar', true);
        }

    }