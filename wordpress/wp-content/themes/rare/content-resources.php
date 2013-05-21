<?php
/**
 * content template for resources page
 */
?>

<div class="span-20 prepend-1 append-1">
    <?php the_content(); ?>
</div>




<div id="recommended-reading-box" class="span-11 prepend-1 append-1">
    
    <h2 class="section-heading">Recommended Reading</h2>
    <hr />
    
        <?php the_field('recommended_reading'); ?>
    
</div> 


<div id="relevant-links-box" class="span-8">
    
    <h2 class="section-heading">Relevant Links</h2>
    <hr />
    
    <?php the_field('relevant_links'); ?>
    
</div>
