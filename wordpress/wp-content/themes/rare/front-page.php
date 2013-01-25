<?php
/**
 * Front Page Template
 * 
 * Contains Front Page Content Block
 *
 */
get_header(); ?>



            <div class="span-20 prepend-1 append-1">
                
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part('content', 'home'); ?>

                <?php endwhile; ?>

            </div>
            
        

<?php get_footer(); ?>