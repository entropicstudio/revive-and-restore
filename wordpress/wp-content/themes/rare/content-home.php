<?php
/**
 * content template for the home page
 */
?>

    <div class="tedx_wrapper">
        <div class="top-shadow"></div>
        <div id="cuban-macaw-homepage">
            <div class="species-caption right middle"><strong>Cuban Red Macaw</strong><br /><em>Extinct: late 19th century</em></div>
            <img src="<?php echo get_template_directory_uri(); ?>/ui/macaw-homepage-tedx.png" />
        </div>
        <?php the_field('section-1'); ?>
    </div>
    

    <div id="home-section-2">
        <?php the_field('section-2'); ?>
    </div>
    
    <br class="clear" />

    <div id="home-section-3">
        <?php the_field('section-3'); ?>
    </div>

    <br class="clear" />

    <div id="home-section-4">
        <?php the_field('section-4'); ?>
    </div>
    
    <div id="home-section-5">
        <?php the_field('section-5'); ?>
        <br class="clear" />
    </div>
    
    <div id="home-section-6">
        <?php the_field('section-6'); ?>
    </div>
    
    <div id="home-section-7">
        <?php the_field('section-7'); ?>
        <br class="clear" />
    </div>