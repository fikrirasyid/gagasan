<?php
/**
 * @package Gagasan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="entry-featured-image as-background">
			<?php the_post_thumbnail( 'full' ); ?>			
		</a>

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

</article><!-- #post-## -->