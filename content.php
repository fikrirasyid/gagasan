<?php
/**
 * @package gagasan
 */
$gagasan_excerpts = get_theme_mod('gagasan_excerpt_options');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( is_sticky() ) : ?>
			<h5 class="stickies featured-idea"><?php _e( 'Featured Idea', 'gagasan' ); ?></h5>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php else: ?>
			<?php gagasan_posted_on();?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif;?>

	</header><!-- .entry-header -->

	<!--?php if ( 'post' != get_post_type() || 'aside' == get_post_format() || is_sticky() || ) : ?-->

	<div class="entry-content">

		<?php
			if ( $gagasan_excerpts ) : 
				the_excerpt();
			
			else :

			the_content( sprintf(/* translators: %s: Name of current post */
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gagasan' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) 
			);
			endif;
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gagasan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<!--?php endif; ?-->

	<?php if ( has_post_thumbnail() ) : ?>
		
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'gagasan-featured' ); ?></a>
		</figure>

	<?php endif;?><!-- .entry-thumbnail -->	
	
	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php gagasan_category_link(); ?>
		<?php endif; ?>
	</footer>
</article><!-- #post-## -->