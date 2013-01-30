<?php
/**
 * sidebar template for the TEDxDeExtinction pages
 */
?>

<div class="span-6 last append-1 tedx-sidebar">
    
    <div class="hopout_badge">
        <img src="<?php echo get_template_directory_uri(); ?>/ui/tedx-meeting.jpg" />
    </div>
    
    <?php 
    if ( dynamic_sidebar('tedx-sidebar') ) : 
        else : 
        ?>
    <?php endif; ?>

</div>
