<?php
/**
 * content template for candidate species page
 */
?>

<div class="span-20 prepend-1 append-1">
    <?php the_content(); ?>
</div>

<div class="cs-column first">
    <?php the_field('cs_column_1'); ?>
</div>

<div class="cs-column">
    <?php the_field('cs_column_2'); ?>
</div>

<div class="cs-column">
    <?php the_field('cs_column_3'); ?>
</div>

<div class="cs-column last">
    <?php the_field('cs_column_4'); ?>
</div>

<br class="clear" />



<?php // edge box ?>

<div id="candidate-edge-box">
    <?php the_field('edge_box'); ?>
    
    <div id="cuban-macaw"></div>
    
</div>

<div id="candidate-criteria-box">
    
    <h2><?php the_field('criteria_heading'); ?></h2>
    
    <div class="criteria-column first">
        <?php the_field('criteria_column_1'); ?>
    </div>
    
    <div class="criteria-column last">
        <?php the_field('criteria_column_2'); ?>
    </div>
    
</div>