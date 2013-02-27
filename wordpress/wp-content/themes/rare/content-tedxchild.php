<?php
/**
 * content template for the TEDxDeExtinction child/ancestor page
 */
?>

<div class="span-13 prepend-1 append-1">
    <h1><?php wp_title(''); ?></h1>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">

            <div class="social-media-box">
                
                <div class="social-media-share">
                    <span class="share-text">Share this page:</span>
                    <script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?> ?>" onclick="return fbs_click()" target="_blank" class="ss-icon ss-facebook ss-social-icon"></a>
                    <a class="ss-icon ss-social-icon ss-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>           
                </div>
                
                <div class="facebook-like-box">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
                </div>
                
            </div>
            
            <div class="entry-info-box">
                <span class="entry-date">Published: <strong><?php the_date('F d, Y'); ?></strong></span>
                <? if (comments_open()){ ?>
                    <span class="entry-comments"><a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a></span>
                <?php } ?>
            </div>
            
            <br class="clear" />
            
        </header><!-- .entry-header -->


        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

        <hr class="post-list"/>

        <footer class="entry-meta">
            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');

            /* translators: used between list items, there is a space after the comma */
            $tag_list = get_the_tag_list('', ', ');
            if ('' != $tag_list) { // is tags
                $utility_text = 'Tags: %2$s';
            } else {
                $utility_text = 'Tags: None ';
            }

            printf(
                    $utility_text, $categories_list, $tag_list, esc_url(get_permalink()), the_title_attribute('echo=0'), get_the_author(), esc_url(get_author_posts_url(get_the_author_meta('ID')))
            );
            ?>
            <?php edit_post_link('Edit this page', '<span class="edit-link"> | ', '</span>'); ?>

        </footer><!-- .entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->



</div>

<?php get_template_part('sidebar', 'tedxdeextinction'); ?>