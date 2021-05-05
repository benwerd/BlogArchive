<?php

namespace IdnoPlugins\BlogArchive\Pages;

use Idno\Common\Entity;
use Idno\Core\Idno;

class Year extends \Idno\Common\Page
{
    function getContent()
    {
        $months = [];

        if (!empty($this->arguments[0])) {
            $year = (int) $this->arguments[0];
            if ($year < 2013 || $year > (int)date('Y')) unset($year);
        }
        if (empty($year)) {
            $this->goneContent();
        }

        for ($i = 12; $i > 0; $i--) {
            $startDate = Idno::site()->db()->formatDate(mktime(0, 0, 0, $i, 1, $year));
            $endDate = Idno::site()->db()->formatDate(mktime(11, 59, 59, $i, 31, $year));
            $count = Entity::countFromX('IdnoPlugins\Text\Entry', ['created' => ['$lt' => $endDate, '$gt' => $startDate]]);
            if ($count) {
                $months[] = $i;
            }
        }

        $t = Idno::site()->template();
        $t->title = 'Blog Archive: ' . $year;
        $t->body = $t->__(['months' => $months, 'year' => $year])->draw('blogarchive/months');
        $t->drawPage();
    }
}
