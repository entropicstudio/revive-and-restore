<?php
/**
 * Default Template File
 * 
 * General page layout. If a more specific template file is not found
 * this is used as the default content latout.
 *
 */
get_header(); ?>



            

                <?php while ( have_posts() ) : the_post(); ?>
                    
                
                    <?php if( get_field('use_sidebar') ){ ?>
                    
                        <div class="span-12 prepend-1 append-1">
                
                            <?php get_template_part('content', 'sidebar'); ?>
                            
                        </div>
                        
                        <!-- sidebar -->
                        <div class="span-7 last append-1">
                            
                            <?php the_field('sidebar_content'); ?>

                        </div>
                        
                        
                    <?php } else { ?>
                        
                        
                        
                        <?

                        if ( is_page(11) ) { // ethics page
                            
                            get_template_part('content', 'ethics');
                            
                        } elseif ( is_page(44) ) { // meetings page
                            
                            get_template_part('content', 'meetings');
                            
                        } elseif ( is_page(40) ) { // candidate species page
                            
                            get_template_part('content', 'candidate');
                            
                        } elseif ( is_page(52) ) { // people & advisors page
                            
                            get_template_part('content', 'people');
                            
                        } elseif (is_page(167) ) { // TEDxDeExtinction homepage
                            
                            get_template_part('content', 'tedxdeextinction');
                            
                        } elseif (is_ancestor(167) ) { // TEDxDeExtinction children/ancestors page
                            
                            get_template_part('content', 'tedxchild');
                            
                        } else { // standard layout
                            
                            get_template_part('content', 'full');
                        }


                        ?>
                        
                        
                        
                    <?php } ?>
                
                        
                        
                <?php endwhile; ?>

            
            

<?php get_footer(); ?>