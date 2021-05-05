<?php

namespace IdnoPlugins\BlogArchive\Pages;

use Idno\Common\Entity;
use Idno\Core\Idno;

class Month extends \Idno\Common\Page
{
    function getContent()
    {
        if (!empty($this->arguments[0])) {
            $year = (int) $this->arguments[0];
            if ($year < 2013 || $year > (int)date('Y')) unset($year);
        }
        if (!empty($this->arguments[1])) {
            $month = (int) $this->arguments[1];
            if ($month > 12 || $month < 1) unset($month);
        }

        if (empty($year) || empty($month)) {
            $this->goneContent();
        }

        $startDate = Idno::site()->db()->formatDate(mktime(0, 0, 0, $month, 1, $year));
        $endDate = Idno::site()->db()->formatDate(mktime(0, 0, 0, $month + 1, 1, $year) - 1);
        $items = Entity::getFromX('IdnoPlugins\Text\Entry', ['created' => ['$lt' => $endDate, '$gt' => $startDate]]);

        $t = Idno::site()->template();
        $t->title = 'Blog Archive: ' . date('F, Y', mktime(0,0,0,$month,1,$year));
        $t->body = $t->__(['items' => $items, 'year' => $year, 'month' => $month])->draw('blogarchive/posts');
        $t->drawPage();
    }
}
