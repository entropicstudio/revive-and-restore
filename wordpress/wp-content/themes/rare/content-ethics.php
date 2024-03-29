<?php
/**
 * content template for ethics page
 */
?>


<div class="span-20 prepend-1 append-1">

    <?php the_content(); ?>



    <div id="tabs">
        
        <ul class="ethics-content-nav">
            <li><a href="#tabs-1">1. <?php the_field('section_1_title'); ?></a></li>
            <li><a href="#tabs-2">2. <?php the_field('section_2_title'); ?></a></li>
            <li><a href="#tabs-3">3. <?php the_field('section_3_title'); ?></a></li>
        </ul>

        
        <div id="tabs-1" class="ethics-tabs genomic-revival-tab">
            
            <?php the_field('section_1'); ?>
            
            <br class="clear" />
            <div class="species-caption right bottom white"><strong>Great Auk</strong></div>
            
        </div>
        
        
        
        
        <div id="tabs-2" class="ethics-tabs captive-breeding-tab">
            
            <?php the_field('section_2'); ?>
            
            <br class="clear" />
            <div class="species-caption right bottom"><strong>Thylacine</strong></div>
            
        </div>
        
        
        
        
        <div id="tabs-3" class="ethics-tabs return-to-wild-tab">
            
            <?php the_field('section_3'); ?>
            
            <br class="clear" />
            <div class="species-caption right bottom white"><strong>Wolly Mammoth</strong></div>
            
        </div>
        
        
        <div id="ethics-footer">
        
            <?php the_field('footer'); ?>

        </div>
        
    </div>



</div>
