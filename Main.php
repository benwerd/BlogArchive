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
        }

    }