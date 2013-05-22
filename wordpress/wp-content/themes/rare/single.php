<?php
/**
 * Single Post Template
 * 
 * Template for displaying single posts.
 *
 */
get_header();
?>


<div class="span-14 prepend-1 append-1">

<?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf('Permalink to %s', the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                <div class="social-media-box">
                    <span class="share-text">Share this page:</span>
                    <script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?> ?>" onclick="return fbs_click()" target="_blank" class="ss-icon ss-facebook ss-social-icon"></a>
                    <a class="ss-icon ss-social-icon ss-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>           
                </div>

                <div class="entry-info-box">
                    <span class="entry-date">Published: <strong><?php the_date('F d, Y'); ?></strong></span>
                    <? if (comments_open()) { ?>
                        <span class="entry-comments"><a href="<?php comments_link(); ?>"><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></a></span>
                    <?php } ?>
                </div>
                <br class="clear" />
            </header><!-- .entry-header -->


            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div>')); ?>
            </div><!-- .entry-content -->

            <hr class="post-list"/>

            <footer class="entry-meta">
                <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(', ');

                /* translators: used between list items, there is a space after the comma */
                $tag_list = get_the_tag_list('', ', ');
                if ('' != $tag_list) { // is tags
                    $utility_text = 'Tags: %2$s ';
                } else {
                    $utility_text = 'Tags: None ';
                }
                
                if ('' != $categories_list) { // is cats
                    $utility_text .= '<br />Categories: %1$s';
                } else {
                    $utility_text .= '<br />Categories: None ';
                }

                printf(
                    $utility_text,
                    $categories_list,
                    $tag_list,
                    esc_url( get_permalink() ),
                    the_title_attribute( 'echo=0' ),
                    get_the_author(),
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                );
                ?>
                <br />
                <?php edit_post_link('Edit this page', 'Admin: <span class="edit-link">', '</span>'); ?>

            </footer><!-- .entry-meta -->
        </article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>

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