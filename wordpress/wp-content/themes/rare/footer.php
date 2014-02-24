<?php
/**
 * Footer Template
 * 
 * Contains footer content and copyright lines
 *
 */

$continuum_options = get_option ( 'rare_continuum_options' );

?>
        <br class="clear" />
        <p class="larger center quiet page-top-link"><a href="#top"><i class="ss-icon" style="font-size: 1.3em; position: relative; top: 6px;">&#xF500;</i> Top of Page</a></p>
    </div>
    
    <div class="container footer_block">
        
        <?php if ( is_page(167) OR is_ancestor(167) ) { ?>
        
            <div class="tedx-footer center">This independent <a href="http://www.ted.com/tedx" target="_blank">TEDx</a> event is operated under license from <a href="http://www.ted.com" target="_blank">TED</a>.</div>
            
        <?php } else { ?>
            
            <div class="span-9 prepend-1 colborder ">
                <h3>Contact Revive & Restore</h3>
                <p class="float_left">
                <strong>Revive & Restore</strong><br />
                The Long Now Foundation<br />
                Fort Mason Center<br />
                2 Marina Boulevard Building A<br />
                San Francisco, CA 94123<br />
                </p>
                
                <p class="float_right">
                email : <a href="mailto:revive@longnow.org">revive@longnow.org</a><br />
                read: <a href="<?php echo get_page_link(52); ?>">About Us</a>
                </p>
            </div>
                        
            <div class="span-9 last rel">
                <h3>Latest Blog Posts</h3>
                
                <ul class="latest-blog-posts">
                 <?php 
                    $args = array(
                        'numberposts' => 4
                        );

 
                    $recent_posts = wp_get_recent_posts( $args );
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                    }
                ?>
                </ul>
            </div>
            
        <?php } ?>
            
    </div>

    <div class="container top-20 sub_footer">
        <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank"><img alt="" title="This work is licensed under a Creative Commons Attribution-ShareAlike 3.0 Unported License." src="http://longnow.org/static/ui/creative_commons_footer_logo.png" border="0" class="va-middle" /></a> The Long Now Foundation &nbsp;&bull;&nbsp; Fostering Long-term Responsibility &nbsp;&bull;&nbsp; est. 01996 &nbsp;&nbsp;&nbsp; <a href="#top" style="color: #4a4637;"><i class="ss-icon">&#xF500;</i> Top of Page</a>
        </p>
    </div>

    <!-- load jQuery and UI from Google CDN -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo get_template_directory_uri(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/FixedColumns.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/jquery.qtip.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/chart.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.thumbnailScroller.js"></script>
    
    <!-- load global javascript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/global.js"></script>

    <script>
        $(function() {
            $( "#tabs" ).tabs();
        });
        
        $(document).ready(function(){
            // Match all <A/> links with a title tag and use it as the content (default).
            $('.tooltip').qtip({
                content: {
                    attr: 'data-hint'
                },
                position: {
                    my: 'bottom middle',
                    at: 'top middle'
                },
                hide: {
                    fixed: true,
                    delay: 300
                },
                show: {
                    solo: true
                }
            })
            
            $('jTscroller a').click(function(){return false;});
            $("#tS2").thumbnailScroller({
                scrollerType:"clickButtons",
                scrollerOrientation:"horizontal",
                scrollSpeed:2,
                scrollEasing:"easeOutCirc",
                scrollEasingAmount:600,
                acceleration:4,
                scrollSpeed:800,
                noScrollCenterSpace:10,
                autoScrolling:0,
                autoScrollingSpeed:2000,
                autoScrollingEasing:"easeInOutQuad",
                autoScrollingDelay:500
            });
            
        });
        
   </script>
   
   
   
   
    <?php wp_footer(); ?>


    </body>
</html>