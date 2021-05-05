<div class="col-md-12">
<p>
    <a href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>archive/">&lt; Archive</a> /
    <a href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>archive/<?php echo $vars['year']; ?>/"><?php echo $vars['year']; ?></a>
</p>
<h2>
    <?php echo date('F, Y', mktime(0,0,0,$vars['month'],1,$vars['year'])); ?>
</h2>
<?php

    if (!empty($vars['items'])) foreach($vars['items'] as $item) {
        if (!empty($item->getOwner())) {
?>
        <h3>
            <a href="<?php echo $item->getDisplayURL(); ?>"><?php echo $item->getTitle(); ?></a>
            / <?php echo date('F j, Y', $item->created) ?>
        </h3>
        <p>
            <?php echo $item->getShortDescription(50); ?>
        </p>
<?php
        }
    }

?>
</div>
