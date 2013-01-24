<?php
/**
 * content template for post lists
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <span class="entry-date">Posted On: <?php the_date('F d, Y'); ?> by 
                    <?php echo '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">' . get_the_author() .'</a>'; ?> 
                    |
                    <a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a>
                </span>
                <hr />
	</header><!-- .entry-header -->

        
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' .'Pages:' . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
        
        <hr />
        
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( ', ' );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ');
			if ( '' != $tag_list ) {
				$utility_text = 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
			} elseif ( '' != $categories_list ) {
				$utility_text = 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
			} else {
				$utility_text = 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
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
		<?php edit_post_link( 'Edit' , '<span class="edit-link">', '</span>' ); ?>

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
