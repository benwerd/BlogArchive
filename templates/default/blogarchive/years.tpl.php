<div class="col-md-12">
<h2>
    Blog Archive
</h2>
<?php

    if (!empty($vars['years'])) foreach($vars['years'] as $year) {

?>
        <h3>
            <a href="<?=\Idno\Core\Idno::site()->config()->getDisplayURL() . 'archive/' . $year ?>/"><?php echo $year; ?></a>
        </h3>
<?php

    }
?>
</div>
