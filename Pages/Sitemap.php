<?php

namespace IdnoPlugins\BlogArchive\Pages;

use Idno\Core\Idno;

class Sitemap extends \Idno\Common\Page
{
    function getContent()
    {
        $years = [];

        for ($i = (int)date('Y'); $i >= 2013; $i--) {
            $startDate = Idno::site()->db()->formatDate(mktime(0, 0, 0, 1, 1, $i));
            $endDate = Idno::site()->db()->formatDate(mktime(11, 59, 59, 12, 31, $i));
            $entity = \IdnoPlugins\Text\Entry::getOne(['created' => ['$lt' => $endDate, '$gt' => $startDate]]);
            if ($entity) {
                $years[] = [
                  'year' => $i,
                  'object' => $entity];
            }
        }

        header('Content-type: application/xml');
        $t = Idno::site()->template();
        echo $t->__(['years' => $years])->draw('blogarchive/sitemap/years');
    }
}
