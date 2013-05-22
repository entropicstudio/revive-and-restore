<?php
/**
 * content template for people page
 */
?>


        <div class="span-20 prepend-1 append-1 padbottom-15">
            <?php the_content(); ?>
        </div>


        <div class="span-12 prepend-1 append-1" id="staff_column">
            <h2 class="section-heading">STAFF</h2>
            <hr />
            <?php the_field('column_1'); ?>

        </div>

        <div class="span-7 last append-1" id="advisors_column">
            <h2 class="section-heading">ADVISORS</h2>
            <hr />
            <?php the_field('column_2'); ?>

        </div>
