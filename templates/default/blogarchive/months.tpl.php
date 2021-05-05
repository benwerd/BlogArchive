<div class="col-md-12">
<p>
    <a href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>archive/">&lt; Archive</a>
</p>
<h2>
    <?php echo $vars['year']; ?>
</h2>
<?php

if (!empty($vars['months'])) foreach ($vars['months'] as $month) {

    ?>
    <h3>
        <a href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() . 'archive/' . $year . '/' . $month ?>/"><?php echo date('F', mktime(0, 0, 0, $month, 1, $year)); ?></a>
    </h3>
    <?php

}
?>
</div>
