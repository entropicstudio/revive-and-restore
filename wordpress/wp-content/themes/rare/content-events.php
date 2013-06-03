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
    
        $x = 1;

        while ( get_field("box_$x") ) {

            echo '<div class="box " id="event-box-'.$x.'">';

                the_field("box_$x");

            echo '</div>';

            $x++;

        }
    
    ?>
    
    <br class="clear" />
    
</div>