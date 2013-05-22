<?php
/**
 * Category List Template
 * 
 * Template for displaying category lists
 *
 */
get_header();
?>


<div class="span-14 prepend-1 append-1">

            <?php if (have_posts()) : ?>


                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                            <?php get_template_part('content', 'list'); ?>
                  
                <?php endwhile; ?>


            <?php else : ?>

                    <article id="post-0" class="post no-results not-found">
                        <header class="entry-header">
                            <h2 class="entry-title">Page Not Found</h2>
                        </header><!-- .entry-header -->
                        <hr />
                        <div class="entry-content">
                            <p>Apologies, but no results were found for the requested page.</p>
                <?php get_search_form(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-0 -->

            <?php endif; ?>

</div>


<!-- sidebar -->

<div class="span-5 last append-1 blog-sidebar">

<?php
if (dynamic_sidebar('blog-sidebar')) :
else :
    ?>
<?php endif; ?>

</div>



    <?php get_footer(); ?>