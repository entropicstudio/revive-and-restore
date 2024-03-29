<?php
/**
 * content template for post lists
 */
global $x;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
        <div class="social-media-box">
            <span class="share-text">Share this page:</span>
            <script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?> ?>" onclick="return fbs_click()" target="_blank" class="ss-icon ss-facebook ss-social-icon"></a>
            <a class="ss-icon ss-social-icon ss-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>           
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
		<?php 
        if( $x == 1 ){
            the_content();
        } else {
            the_excerpt();
        } 
        $x++;
        ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' .'Pages:' . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
        
    <hr class="post-list"/>
        
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( ', ' );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ');
			if ( '' != $tag_list ) { // is tags
				$utility_text = 'Tags: %2$s';
			}  else {
				$utility_text = 'Tags: None ';
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
		<?php edit_post_link( 'Edit this page' , '<span class="edit-link"> | ', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( 'About %s', get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( 'View all posts by %s <span class="meta-nav">&rarr;</span>', get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<br />
<br />
