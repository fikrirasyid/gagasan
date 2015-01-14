<?php
/**
 * @package Gagasan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php 
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gagasan' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
				
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gagasan' ),
				'after'  => '</div>',
				) 
			);
		?>
				
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php gagasan_posted_on(); ?>
		<?php endif; ?>
		
		<?php 
		if ( is_single() ):
			the_title( '<h1 class="entry-title">', '</h1>' );
		else:
			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); 
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php 
				gagasan_author();
				gagasan_category_link();
				edit_post_link( __( 'Edit', 'gagasan' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
		<?php gagasan_tags_links();?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
