<?php
/**
 * content template for the TEDxDeExtinction homepage
 */
?>

<div class="span-13 prepend-1 append-1">
&nbsp;
    <?php // query_posts('category_id=7'); ?>
    
    <?php // while (have_posts()) : the_post(); ?>
        
        <?php // get_template_part('content', 'list'); ?>

    <?php // endwhile; ?>
    
     <?php // wp_reset_query(); ?>
    
    <?php the_content(); ?>

</div>


    <?php get_template_part('sidebar', 'tedxdeextinction'); ?>