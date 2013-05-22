<?php
/**
 * content template for the home pag
 */
?>
    
    <?php if ( the_content() ) { ?>
    <div class="span-20 prepend-1 append-1 padbottom-15">
        <?php the_content(); ?>
    </div>
    <?php } ?>
    
    <div class="homepage-box-section first">
        
        <div class="box-grid first boxborder">
            <?php the_field('box-1'); ?>
        </div>

        <div class="box-grid boxborder">
            <?php the_field('box-2'); ?>
        </div>

        <div class="box-grid last">
                <?php the_field('box-3'); ?>
        </div>
        
    </div>

    <div class="homepage-box-section">
        
        <div class="box-grid first boxborder">
            <?php the_field('box-4'); ?>
        </div>

        <div class="box-grid boxborder">
            <?php the_field('box-5'); ?>
        </div>

        <div class="box-grid last">
            <?php the_field('box-6'); ?>
        </div>
        
    </div>

    <div class="homepage-box-section last">
        
        <div class="box-grid first boxborder">
            <?php the_field('box-7'); ?>
        </div>

        <div class="box-grid boxborder">
            <?php the_field('box-8'); ?>
        </div>

        <div class="box-grid last">
            <?php the_field('box-9'); ?>
        </div>
        
    </div>