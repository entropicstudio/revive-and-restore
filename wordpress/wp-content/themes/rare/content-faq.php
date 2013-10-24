<?php
/**
 * content template for FAQ
 */
?>

        <div class="span-20 prepend-1 append-1">
            <?php the_content(); ?>
        </div>


        <div class="faq-column first-col prepend-1">
            
            <?php the_field('faq_left'); ?>

        </div>

        <div class="faq-column last append-1">
            
            <?php the_field('faq_right'); ?>

        </div>
