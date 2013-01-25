<?php
/**
 * Home Posts Template file
 * 
 * Used for the main blog posts page
 * 
 *
 */
get_header();
?>



            <div class="span-14 prepend-1 append-1">

            <?php if (have_posts()) : ?>


                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                            <?php get_template_part('content', 'list'); ?>
                        <div id="comments_box">
                        <?php comments_template('', true); ?>
                        </div>
                <?php endwhile; ?>


            <?php else : ?>

                    <article id="post-0" class="post no-results not-found">
                        <header class="entry-header">
                            <h2 class="entry-title">Page Not Found</h21>
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
            <div class="span-6 last">

                <?php if (!function_exists('dynamic_sidebar')
                        || !dynamic_sidebar()) :
                    ?>

            <?php endif; ?>

            </div>


            <?php get_footer(); ?>