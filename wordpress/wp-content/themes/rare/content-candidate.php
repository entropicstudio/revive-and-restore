<?php
/**
 * content template for candidate species page
 */
?>

<div class="span-20 prepend-1 append-1">
    <?php the_content(); ?>
</div>




<div id="candidate-species-box">
    
    <div class="prepend-1 span-10">
        <?php the_field('cs_column_1'); ?>
    </div>
    
    <div class="span-10 appent-1 last">
        <?php the_field('cs_column_2'); ?>
    </div>
    
    
</div>


<!-- <div class="species-caption center bottom white"><strong>Quagga</strong><br /><em>Extinct: 1883</em></div> -->