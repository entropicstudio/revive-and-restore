<?php
/**
 * content template for 2 column pages
 */
?>

<div class="span-20 prepend-1 append-1">
    
<?php the_content(); ?>

</div>

<div class="span-10 prepend-1 append-1 padtop-20">
    <?php the_field('column_1'); ?>

</div>

<div class="span-9 last append-1 padtop-20">
    <?php the_field('column_2'); ?>

</div>