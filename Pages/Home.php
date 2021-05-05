<?php

namespace IdnoPlugins\BlogArchive\Pages;

use Idno\Common\Entity;
use Idno\Core\Idno;

class Home extends \Idno\Common\Page
{
    function getContent()
    {
        $years = [];

        for ($i = (int)date('Y'); $i >= 2013; $i--) {
            $startDate = Idno::site()->db()->formatDate(mktime(0, 0, 0, 1, 1, $i));
            $endDate = Idno::site()->db()->formatDate(mktime(11, 59, 59, 12, 31, $i));
            $count = Entity::countFromX('IdnoPlugins\Text\Entry', ['created' => ['$lt' => $endDate, '$gt' => $startDate]]);
            if ($count) {
                $years[] = $i;
            }
        }

        $t = Idno::site()->template();
        $t->title = 'Blog Archive';
        $t->body = $t->__(['years' => $years])->draw('blogarchive/years');
        $t->drawPage();
    }
}
