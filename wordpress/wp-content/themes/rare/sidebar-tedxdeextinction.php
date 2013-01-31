<?php
/**
 * sidebar template for the TEDxDeExtinction pages
 */
?>

<div class="span-6 last append-1 tedx-sidebar">
    
    <?php 
    if ( dynamic_sidebar('tedx-sidebar') ) : 
        else : 
        ?>
    <?php endif; ?>

</div>
