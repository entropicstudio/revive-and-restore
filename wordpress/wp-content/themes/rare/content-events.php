<?php
/**
 * content template for events page
 */
?>

<?php if (the_content()) { ?>
    <div class="event-content-box">
        <?php the_content(); ?>
    </div>
<?php } ?>

<div id="event-boxes">
    
    
    <?php
    
        // get event boxes and display in reverse order
    
        $x = 1;
        $events = 0; // total events
        
        while ( get_field("box_$x") ){
            $events++;
            $x++;
        }
        
        while ( $events > 0 ) {

            echo '<div class="box " id="event-box-'.$events.'">';

                the_field("box_$events");

            echo '</div>';

            $events--;

        }
    
    ?>
    
    <br class="clear" />
    
</div>