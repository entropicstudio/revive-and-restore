<?php
/**
 * content template for the home page
 */
?>

    <div class="tedx_wrapper">
        <?php the_field('section-1'); ?>
    </div>

    <?php the_field('section-2'); ?>

    <div class="dotted_break bottom-30 spacer-10"> </div>

    <?php the_field('section-3'); ?>

    <br class="clear" />

    <div class="roster_wrapper">
        <?php the_field('section-4'); ?>
        <br class="clear" />
    </div>

    <?php the_field('section-5'); ?>