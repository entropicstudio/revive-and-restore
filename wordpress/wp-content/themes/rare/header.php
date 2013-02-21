<?php
/**
 * Main Header
 *
 * Contains head, page header, main navigation and main photo
 */

// load custom theme options
$rare_theme_options = get_option ( 'rare_theme_options' );

?><!DOCTYPE html>
<html lang="en-US">
    <head>

        <title>
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title('|', true, 'right');

            // Add the blog name.
            bloginfo('name');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            ?>
        </title>



        <meta charset="<?php bloginfo('charset'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/ui/favicon.png" />
        <!--[if IE]><link rel="SHORTCUT ICON" href="<?php echo get_template_directory_uri(); ?>/ui/favicon.ico"/><![endif]-->

        <!-- load web fonts from google -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic|EB+Garamond' rel='stylesheet' type='text/css'>        

        <!-- theme stylesheets -->  
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bristle_classic.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfonts/ss-social.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfonts/ss-standard.css" />
        
        
        
        
        
        
        <?php // facebook open graph meta for sharing/liking links ?>
        
        <meta property="og:title" content="<?php wp_title('-', TRUE, 'right');  bloginfo('name'); ?>" />
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        
        <?php if ( is_page(167) || is_ancestor(167) || in_category(7) ) { // change up for TEDx pages ?>
        
            <meta property="og:image" content="http://static.longnow.org/TEDxDeExtinction-Logo.jpg" />
            <meta property="og:site_name" content="TEDxDeExtinction" />
            <meta property="og:description" content="Rapid advances in molecular biology are converging with new perspectives in conservation biology to create a new field called “de-extinction.”  Now is the time to begin public discussion of how de-extinction projects can best proceed responsibly."/>
           
        <?php } else { // non TEDx pages and must be a single page, not a list ?>
            
            <meta property="og:image" content="http://static.longnow.org/revive_and_restore.jpg" />
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
            
            <?php if ( is_singular() && !is_front_page() ) { ?>
            
                <meta property="og:description" content="<?php setup_postdata($post); echo esc_attr(strip_tags(get_the_excerpt()));  ?>" />
            
            <?php } else { ?>
            
                <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
                
            <?php } ?>
             
        <?php } ?>
        
            
            
                
                
                
            
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.  ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->


        
        

        <?php // wordpress header stuff
        
        wp_head(); ?>

        
        
        
        <script>
            // Google Analytics Tracking Code
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-1550370-2']);
            _gaq.push(['_trackPageview']);

            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
      </script>
      
      
      

    </head>
    

    <body <?php body_class(); ?>>

        <a name="top"></a>





        <!-- HEADER ====================================================== -->

        <div class="container header_block">

            <div class="span-10 prepend-1">
                <a href="http://longnow.org/" title="The Long Now Foundation">
                    <div class="logo"></div>
                </a>
            </div>

            <div class="span-10 append-1 last right top-40">
                <a id="longmenu-toggle" href="">show longnow.org menu <i class="ss-icon">&#xED50;</i></a>
            </div>

        </div>






        <!-- MAIN MENU =================================================== -->

        <div id="longnow-menu" class="container menu_block" style="display: none;">
            
            <?php wp_nav_menu( array('menu' => 'Longnow Global Menu', 'menu_id' => 'global_menu', 'container' => '', 'fallback_cb' => '' )); ?>
            
        </div> <!-- menu_block -->







        <!-- Main Photo -->
        <div class="container longphoto_block" id="longphoto">

            <?php  if ( is_page(167) || is_ancestor(167) || in_category(7) ) { // Show TEDx Header Image for all TEDx Pages ?>
           
                <div class="span-22 center"><img src="<?php echo get_template_directory_uri(); ?>/ui/tedx_photo_bg.jpg" alt="" /></div>
            
            <?php } elseif (is_front_page()) { // show full isabella painting on home page ?>
                
                <?php
                   // <span class="lp-facebook"></span>
                   // <span class="lp-twitter"></span>
                   // <span class="lp-googleplus"></span>
                ?>
                
                <a class="lp-isabella_link" href="<?php echo site_url('/tedxdeextinction/speakers/#isabella-kirkland-bio'); ?>"></a>
                <span class="lp-isabella_painting"></span>
                <div class="span-22 center"><img src="<?php echo get_template_directory_uri(); ?>/ui/longphoto_bg.jpg" alt="" /></div>
                
            <?php } else { // show short isbella painting on inside pages ?>

                <div class="span-22 center"><img src="<?php echo get_template_directory_uri(); ?>/ui/longphoto_bg_short.jpg" alt="" /></div>

            <?php } ?>
            
                
                
            <!-- revive and restore menu -->
            <div id="rare-nav-container">
                
                <?php wp_nav_menu( array('menu' => 'Rare Main Nav', 'menu_id' => 'rare-nav-main', 'container' => '', 'fallback_cb' => '' )); ?>
                
                <!-- rare search box -->
                <form role="search" method="get" id="rare-search" action="<?php echo home_url( '/' ); ?>">
                    <i class="ss-icon">&#x1F50E;</i><input type="text" value="" name="s" id="s" />
                </form>
                
            </div>
                
        </div>


        <div class="container body_block rel">
            <a name="content"></a>
            
            <?php if( is_front_page() || is_page(167) || is_ancestor(167) || in_category(7)){ ?> 
            
          
            <?php } else { ?>
            
                <h1 class="prepend-1 append-1"><?php wp_title(''); ?></h1>
                
            <?php } ?>