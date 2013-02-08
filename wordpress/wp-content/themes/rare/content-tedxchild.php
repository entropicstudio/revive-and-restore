<?php
/**
 * content template for the TEDxDeExtinction child/ancestor page
 */
?>

<div class="span-13 prepend-1 append-1">
    <h1><?php wp_title(''); ?></h1>
    
    <?php the_content(); ?>

</div>

<?php get_template_part('sidebar', 'tedxdeextinction'); ?>