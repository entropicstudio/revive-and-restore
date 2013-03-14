<?php
/**
 * content template for meetings page
 */
?>


<div class="tedx-box">
    <?php the_field('section_1'); ?>
    <br class="clear" />
</div>

<div id="meetings-boxes">
    
    <?php the_field('box_1'); ?>
    <br class="clear" />
    <?php the_field('box_2'); ?>
    <br class="clear" />
    
</div>

<div id="meetings-content-box">
    
    <?php the_content(); ?>
    
</div>
<div class="species-caption right bottom white"><strong>Female/Male Labrador Duck</strong></div>