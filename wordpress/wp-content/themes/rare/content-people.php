<?php
/**
 * content template for people page
 */
?>


        <div class="span-20 prepend-1 append-1 padbottom-25">
            <?php the_content(); ?>
        </div>


        <div class="span-6 prepend-1 append-1" id="staff_column">
            <?php the_field('column_1'); ?>
        </div>

        <div class="span-6 append-1" id="advisors_column">
            <?php the_field('column_2'); ?>
        </div>
        
        <div class="span-6 last append-1" id="supporters_column">
            <?php the_field('column_3'); ?>
        </div>
