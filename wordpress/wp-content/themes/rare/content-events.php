<?php
/**
 * content template for events page
 */
?>


    <div class="span-20 prepend-1 append-1 padbottom-25 last">
        <?php the_content(); ?>
    </div>


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