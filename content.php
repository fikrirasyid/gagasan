<?php
/**
 * @package Gagasan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>

		<div class="entry-featured-image as-background">
			<?php the_post_thumbnail( 'full' ); ?>			
		</div>

	<?php endif; ?>

	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gagasan_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>		

		<?php gagasan_entry_subtitle(); ?>
	</header><!-- .entry-header -->
	
	<?php if ( 'post' != get_post_type() || 'aside' == get_post_format() ) : ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gagasan' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gagasan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php endif; ?>

</article><!-- #post-## -->