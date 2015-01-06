<?php
/**
 * @package Gagasan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			<?php gagasan_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<?php gagasan_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
