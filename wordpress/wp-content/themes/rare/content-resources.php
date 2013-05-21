<?php
/**
 * content template for candidate species page
 */
?>

<div class="span-20 prepend-1 append-1">
    <?php the_content(); ?>
</div>


<div id="candidate-criteria-box">
    
    <h2><?php the_field('criteria_heading'); ?></h2>
    
        <?php the_field('criteria_column_1'); ?>
    <div class="criteria-last">
        <?php the_field('criteria_column_2'); ?>
    </div>
    
</div>

<div id="candidate-species-box">
    <h2>Candidates</h2>
    <div class="cs-column">
        <?php the_field('cs_column_1'); ?>
    </div>
    <div class="cs-column">
        <?php the_field('cs_column_2'); ?>
    </div>
    
    <br class="clear" />
    
    <div id="candidate-edge-box">
        <?php the_field('edge_box'); ?>
    </div>
    
</div>

<div class="species-caption center bottom white"><strong>Quagga</strong><br /><em>Extinct: 1883</em></div>