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
                        
                    <?php } elseif( get_field('use_2_column') ) { ?>
                        
                        <div class="span-9 prepend-1 append-2">
                
                            <?php get_template_part('content', 'full'); ?>
                            
                        </div>
                        
                        <div class="span-9 last append-1">
                
                            <?php the_field('column_2'); ?>
                            
                        </div>
                        
                        
                        
                    <?php } else { ?>
                        
                        <?

                        if( is_page(11)) {
                            
                            get_template_part('content', 'ethics');
                            
                        } else {
                            
                            get_template_part('content', 'full');
                        }


                        ?>
                        
                    <?php } ?>
                
                <?php endwhile; ?>

            
            

<?php get_footer(); ?>