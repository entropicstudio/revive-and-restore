<?php
/**
 * content template for passenger pigeon combeback
 */
?>

        <div class="span-20 prepend-1 append-1">
            <?php the_content(); ?>
        </div>


        <div class="span-11 prepend-1 first">
            
            <?php the_field('column_1'); ?>

        </div>

        <div class="span-8 last append-1">
            
            <?php the_field('column_2'); ?>

        </div>
