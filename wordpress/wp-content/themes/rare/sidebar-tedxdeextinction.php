<?php
/**
 * sidebar template for the TEDxDeExtinction pages
 */
?>

<div class="span-6 last append-1 tedx-sidebar">
    
    <div class="hopout_badge">
        <img src="<?php echo get_template_directory_uri(); ?>/ui/tedx-meeting.jpg" />
    </div>
    
    <h3>TEDxDeExtinction</h3>
    <ul>
        <?php wp_list_pages('child_of=167&title_li=&sort_column=post_title'); ?>
    </ul>

</div>
