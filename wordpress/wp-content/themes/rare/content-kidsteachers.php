<?php
/**
 * content template for kids & teachers
 */
?>

        <div class="span-20 prepend-1 append-1">
            <?php the_content(); ?>
        </div>


        <div class="span-11 append-1 prepend-1">
            
            <?php the_field('column_1'); ?>

        </div> 

        <div class="span-8 last append-1">
            
            <?php the_field('column_2'); ?>

        </div>
        
        <div class="span-20 prepend-1 append-1 padtop-25">
            <?php the_field('footer_content'); ?>
        </div>