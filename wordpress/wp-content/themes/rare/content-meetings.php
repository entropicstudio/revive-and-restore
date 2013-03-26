<?php
/**
 * content template for meetings page
 */
?>

<?php if (the_content()) { ?>
    <div class="meetings-content-box">
        <?php the_content(); ?>
    </div>
<?php } ?>

<div id="meetings-boxes">
    
    <div class="box">
        <?php the_field('box_1'); ?>
    </div>
   
    <div class="box">
        <?php the_field('box_2'); ?>
    </div>
    
    <div class="box last">
        <?php the_field('box_3'); ?>
    </div>
    
    <br class="clear" />
    
</div>

<div class="species-caption right bottom white"><strong>Female/Male Labrador Duck</strong></div>