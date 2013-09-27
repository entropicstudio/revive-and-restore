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
        
        <?php if ( is_page(167) || is_ancestor(167) ) { // change up for TEDx pages ?>
        
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

            <?php  if ( is_page(167) || is_ancestor(167) ) { // Show TEDx Header Image for all TEDx Pages ?>
           
                <div id="tedxdeextinctionlongphoto_hype_container" class="span-22 center" style="width:870px;height:321px;">
                    <div class="species-caption right middle white" style="top: 68%;"><strong>Cuban Red Macaw</strong><br /><em>Extinct: late 19th century</em></div>
                    <script type="text/javascript" charset="utf-8" src="http://static.longnow.org/widgets/TEDxDeExtinction-longphoto/tedxdeextinctionlongphoto_hype_generated_script.js"></script>
                    <noscript>
                        <img src="<?php echo get_template_directory_uri(); ?>/ui/tedx_photo_bg.jpg" alt="" />
                    </noscript>
                </div>
            
            <?php } elseif (is_front_page()) { // show full isabella painting on home page ?>
                
                <?php
                   // <span class="lp-facebook"></span>
                   // <span class="lp-twitter"></span>
                   // <span class="lp-googleplus"></span>
                ?>
                
                <a class="lp-isabella_link" href="<?php echo site_url('/tedxdeextinction/speakers/#isabella-kirkland-bio'); ?>"></a>
                
                <div class="span-22 center">
                    
                    <img src="<?php echo get_template_directory_uri(); ?>/ui/longphoto_bg.jpg" alt="" />
                    
                    <div id="painting-key-holder">
                        <div id="painting-key-box" >
                            <span class="key key-1 tooltip" data-hint="<strong>Punaluu cyanea</strong> <br/><em>Cyanea truncata</em>" ></span>
                            <span class="key key-1-2 tooltip" data-hint="<strong>Punaluu cyanea</strong> <br/><em>Cyanea truncata</em>" ></span>
                            <span class="key key-2 tooltip" data-hint="<strong>Mamo</strong> <br/><em>Drepanis pacifica</em>" ></span>
                            <span class="key key-3 tooltip" data-hint="<strong>Ula-ai-hawane</strong> <br/><em>Ciridops anna</em>" ></span>
                            <span class="key key-4 tooltip" data-hint="<strong>Hawaiian ’O’o</strong> <br/><em>Moho nobilis</em>" ></span>
                            <span class="key key-5 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula bilineata</em>" ></span>
                            <span class="key key-5-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula bilineata</em>" ></span>
                            <span class="key key-6 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula radiata</em>" ></span>
                            <span class="key key-6-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula radiata</em>" ></span>
                            <span class="key key-7 tooltip" data-hint="<strong>Passenger pigeon</strong> <br/><em>Ectopistes migratorius</em>" ></span>
                            <span class="key key-8 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella buddii</em>" ></span>
                            <span class="key key-8-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella buddii</em>" ></span>
                            <span class="key key-9 tooltip" data-hint="<strong>Lobelia</strong> <br/><em>Lobelia dunbarii</em>" ></span>
                            <span class="key key-9-2 tooltip" data-hint="<strong>Lobelia</strong> <br/><em>Lobelia dunbarii</em>" ></span>
                            <span class="key key-10 tooltip" data-hint="<strong>Stenogyne</strong> <br/><em>Stenogyne haliakalae</em>" ></span>
                            <span class="key key-10-2 tooltip" data-hint="<strong>Stenogyne</strong> <br/><em>Stenogyne haliakalae</em>" ></span>
                            <span class="key key-10-3 tooltip" data-hint="<strong>Stenogyne</strong> <br/><em>Stenogyne haliakalae</em>" ></span>
                            <span class="key key-11 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella papyracea</em>" ></span>
                            <span class="key key-11-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella papyracea</em>" ></span>
                            <span class="key key-12 tooltip" data-hint="<strong>Bachman’s warbler</strong> <br/><em>Vermivora bachmanii</em>" ></span>
                            <span class="key key-13 tooltip" data-hint="<strong>Paradise parrot</strong> <br/><em>Psephotus pulcherrimus</em>" ></span>
                            <span class="key key-14 tooltip" data-hint="<strong>Paintbrush</strong> <br/><em>Castilleja cruenta</em>" ></span>
                            <span class="key key-14-2 tooltip" data-hint="<strong>Paintbrush</strong> <br/><em>Castilleja cruenta</em>" ></span>
                            <span class="key key-15 tooltip" data-hint="<strong><em>’akialoa</em></strong> <br/><em>Hemignathus obscurus</em>" ></span>
                            <span class="key key-15-2 tooltip" data-hint="<strong><em>’akialoa</em></strong> <br/><em>Hemignathus obscurus</em>" ></span>
                            <span class="key key-16 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula formosa</em>" ></span>
                            <span class="key key-16-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula formosa</em>" ></span>
                            <span class="key key-17 tooltip" data-hint="<strong>Carolina parakeet</strong> <br/><em>Conuropsis carolinensis</em>" ></span>
                            <span class="key key-18 tooltip" data-hint="<strong>Hawaiian fern</strong> <br/><em>Diellia mannii</em>" ></span>
                            <span class="key key-18-2 tooltip" data-hint="<strong>Hawaiian fern</strong> <br/><em>Diellia mannii</em>" ></span>
                            <span class="key key-19 tooltip" data-hint="<strong>Hawaiian fern</strong> <br/><em>Botrychium subbifoliatum</em>" ></span>
                            <span class="key key-19-2 tooltip" data-hint="<strong>Hawaiian fern</strong> <br/><em>Botrychium subbifoliatum</em>" ></span>
                            <span class="key key-20 tooltip" data-hint="<strong>Maui love grass</strong> <br/><em>Eragrostis mauiensis</em>" ></span>
                            <span class="key key-20-2 tooltip" data-hint="<strong>Maui love grass</strong> <br/><em>Eragrostis mauiensis</em>" ></span>
                            <span class="key key-21 tooltip" data-hint="<strong>Gould’s emerald</strong> <br/><em>Chlorostilbon elegans</em>" ></span>
                            <span class="key key-22 tooltip" data-hint="<strong>Jamaica giant galliwasp</strong> <br/><em>Celestus occiduus</em>" ></span>
                            <span class="key key-23 tooltip" data-hint="<strong>Laughing owl</strong> <br/><em>Sceloglaux albifacies</em>" ></span>
                            <span class="key key-24 tooltip" data-hint="<strong>Gastric brooding frog</strong> <br/><em>Rheobatrachus silus</em>" ></span>
                            <span class="key key-24-2 tooltip" data-hint="<strong>Gastric brooding frog</strong> <br/><em>Rheobatrachus silus</em>" ></span>
                            <span class="key key-25 tooltip" data-hint="<strong>Gecko </strong> <br/><em>Phelsuma edwardnewtoni</em>" ></span>
                            <span class="key key-26 tooltip" data-hint="<strong>Horns, blue buck</strong> <br/><em>Hippotragus leucophaeus</em>" ></span>
                            <span class="key key-26-2 tooltip" data-hint="<strong>Horns, blue buck</strong> <br/><em>Hippotragus leucophaeus</em>" ></span>
                            <span class="key key-27 tooltip" data-hint="<strong>Falls of the Ohio scurfpea</strong> <br/><em>Orbexilum stipulatum</em>" ></span>
                            <span class="key key-27-2 tooltip" data-hint="<strong>Falls of the Ohio scurfpea</strong> <br/><em>Orbexilum stipulatum</em>" ></span>
                            <span class="key key-28 tooltip" data-hint="<strong>White-footed rabbit rat</strong> <br/><em>Conilurus albipes</em>" ></span>
                            <span class="key key-29 tooltip" data-hint="<strong>Chatham Island rail</strong> <br/><em>Rallus modestus</em>" ></span>
                            <span class="key key-30 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella abbreviata</em>" ></span>
                            <span class="key key-30-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella abbreviata</em>" ></span>
                            <span class="key key-31 tooltip" data-hint="<strong>Golden toad</strong> <br/><em>Bufo periglenes</em>" ></span>
                            <span class="key key-31-2 tooltip" data-hint="<strong>Golden toad</strong> <br/><em>Bufo periglenes</em>" ></span>
                            <span class="key key-32 tooltip" data-hint="<strong>Egg, Syrian ostrich</strong> <br/><em>Struthia camelus syriacus</em>" ></span>
                            <span class="key key-33 tooltip" data-hint="<strong>Cuban begonia</strong> <br/><em>Begonia cowellii</em>" ></span>
                            <span class="key key-33-2 tooltip" data-hint="<strong>Cuban begonia</strong> <br/><em>Begonia cowellii</em>" ></span>
                            <span class="key key-33-3 tooltip" data-hint="<strong>Cuban begonia</strong> <br/><em>Begonia cowellii</em>" ></span>
                            <span class="key key-34 tooltip" data-hint="<strong>Amistad gambusia</strong> <br/><em>Gambusia amistadensis</em>" ></span>
                            <span class="key key-34-2 tooltip" data-hint="<strong>Amistad gambusia</strong> <br/><em>Gambusia amistadensis</em>" ></span>
                            <span class="key key-35 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma propinqua</em>" ></span>
                            <span class="key key-36 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma arcaeformis</em>" ></span>
                            <span class="key key-37 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Pleurobema troschelianum </em>" ></span>
                            <span class="key key-37-2 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Pleurobema troschelianum </em>" ></span>
                            <span class="key key-38 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma flexuosa</em>" ></span>
                            <span class="key key-38-2 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma flexuosa</em>" ></span>
                            <span class="key key-39 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma lenior</em>" ></span>
                            <span class="key key-40 tooltip" data-hint="<strong>Freshwater mussel</strong> <br/><em>Epioblasma haysiana</em>" ></span>
                            <span class="key key-41 tooltip" data-hint="<strong>Xerces blue</strong> <br/><em>Glaucopsyche xerces</em>" ></span>
                            <span class="key key-42 tooltip" data-hint="<strong>New Zealand grayling</strong> <br/><em>Prototroctes oxyrhynchus</em>" ></span>
                            <span class="key key-43 tooltip" data-hint="<strong>Blackfin cisco</strong> <br/><em>Coregonus nigripinnis</em>" ></span>
                            <span class="key key-43-2 tooltip" data-hint="<strong>Blackfin cisco</strong> <br/><em>Coregonus nigripinnis</em>" ></span>
                            <span class="key key-44 tooltip" data-hint="<strong>Clear Lake splittail</strong> <br/><em>Pogonichthys ciscoides</em>" ></span>
                            <span class="key key-45 tooltip" data-hint="<strong>Thicktail chub</strong> <br/><em>Gila crassicauda</em>" ></span>
                            <span class="key key-46 tooltip" data-hint="<strong>Orange-backed desert bandicoot</strong> <br/><em>Perameles eremiana</em>" ></span>
                            <span class="key key-47 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula remota</em>" ></span>
                            <span class="key key-47-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula remota</em>" ></span>
                            <span class="key key-48 tooltip" data-hint="<strong>Hula painted frog</strong> <br/><em>Discoglossus nigriventer</em>" ></span>
                            <span class="key key-49 tooltip" data-hint="<strong>Pringle’s monardella</strong> <br/><em>Monardella pringlei</em>" ></span>
                            <span class="key key-49-2 tooltip" data-hint="<strong>Pringle’s monardella</strong> <br/><em>Monardella pringlei</em>" ></span>
                            <span class="key key-50 tooltip" data-hint="<strong>Feather, double-banded argus pheasant</strong> <br/><em>Argusianus bipunctatus</em>" ></span>
                            <span class="key key-51 tooltip" data-hint="<strong>Darwin’s rice rat</strong> <br/><em>Nesoryzomys darwini</em>" ></span>
                            <span class="key key-52 tooltip" data-hint="<strong>Stephens Island wren</strong> <br/><em>Xenicus lyalli</em>" ></span>
                            <span class="key key-53 tooltip" data-hint="<strong>Rock’s phyllostegia</strong> <br/><em>Phyllostegia rockii</em>" ></span>
                            <span class="key key-54 tooltip" data-hint="<strong>Egg, pink-headed duck</strong> <br/><em>Rhodonessa caryophyllacea</em>" ></span>
                            <span class="key key-55 tooltip" data-hint="<strong>Egg, Aldabra brush warbler</strong> <br/><em>Nesillas aldabrana</em>" ></span>
                            <span class="key key-56 tooltip" data-hint="<strong>Mariposa lily</strong> <br/><em>Calochortus monanthus</em>" ></span>
                            <span class="key key-56-2 tooltip" data-hint="<strong>Mariposa lily</strong> <br/><em>Calochortus monanthus</em>" ></span>
                            <span class="key key-57 tooltip" data-hint="<strong>Long-tailed hopping mouse</strong> <br/><em>Notomys longicaudatus</em>" ></span>
                            <span class="key key-58 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella valida</em>" ></span>
                            <span class="key key-59 tooltip" data-hint="<strong>Egg, great auk</strong> <br/><em>Alca impennis</em>" ></span>
                            <span class="key key-60 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella elegans</em>" ></span>
                            <span class="key key-60-2 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Achatinella elegans</em>" ></span>
                            <span class="key key-61 tooltip" data-hint="<strong>Skull, Tasmanian tiger</strong> <br/><em>Thylacinus cynocephalus</em>" ></span>
                            <span class="key key-62 tooltip" data-hint="<strong>Turquoise-throated puffleg</strong> <br/><em>Eriocnemis godini</em>" ></span>
                            <span class="key key-63 tooltip" data-hint="<strong>Tree snail</strong> <br/><em>Partula nodosa</em>" ></span>
                        </div>
                    </div>
                    
                </div>
                
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
            
            <?php if( is_front_page() || is_page(167) || is_ancestor(167) || is_single() || is_home() ){ ?> 
            
          
            <?php } elseif( is_category() ){ ?>
                
                <h3 class="prepend-1 append-1"><?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h3>

            <?php } elseif( is_archive() ){ ?>
                
                <h3 class="prepend-1 append-1">
                    <?php if ( is_day() ) : ?>
                        <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
                    <?php elseif ( is_month() ) : ?>
                        <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) ); ?>
                    <?php elseif ( is_year() ) : ?>
                        <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) ); ?>
                    <?php elseif ( is_tag() ) : ?>
                       <?php printf( __( 'Tag Archives: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
                    <?php else : ?>
                        <?php _e( 'Blog Archives' ); ?>
                    <?php endif; ?>
                </h3>
  
            <?php } else { ?>
            
                <h1 class="prepend-1 append-1"><?php wp_title(''); ?></h1>
                
            <?php } ?>