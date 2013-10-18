<?php
/**
 * content template for candidate species page
 */
?>

<div class="span-20 prepend-1 append-1">
    <?php the_content(); ?>
</div>




<div id="candidate-species-box" class="span-20 prepend-1 append-1">
    
    <div class="cs-column">
        <?php the_field('cs_column_1'); ?>
    </div>
    
    <div class="cs-column">
        <?php the_field('cs_column_2'); ?>
    </div>
    
    <div class="cs-column last">
        <?php the_field('cs_column_3'); ?>
    </div>
    
    
</div>


<!-- <div class="species-caption center bottom white"><strong>Quagga</strong><br /><em>Extinct: 1883</em></div> -->