<?php
/**
 * @package gagasan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
		the_title( '<h1 class="entry-title">', '</h1>'); 
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gagasan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php 
				gagasan_posted_on();
				gagasan_author();
				gagasan_category_link();
				edit_post_link( __( 'Edit', 'gagasan' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
		<?php gagasan_tags_links();?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
