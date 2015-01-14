<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package gagasan
 */
$logo_image = get_theme_mod('gagasan_logo_image');
$use_gravatar = get_theme_mod('gagasan_use_gravatar');

?>

<div id="secondary" class="widget-area" role="complementary">
		<div class="inner--container sidebar">	
			<a class="user-avatar circle" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if ( $use_gravatar ) :?>
					<img class="gagasan-avatar circle gravatar" src="<?php echo gagasan_gravatar_logo(); ?>"/>
				<?php elseif ( $logo_image ) : ?>
					<img class="gagasan-avatar circle" src="<?php echo $logo_image ?>"/>
				<?php else: ?>
					<figure class="gagasan-avatar default-logo circle"/></figure>
				<?php endif; ?>
			</a><!-- .user-avatar -->

			<hgroup class="profile-name">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>					
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php get_template_part('socials');?>
			</hgroup>
			
			<aside class="widget widget_search">
				<?php get_search_form();?>
			</aside>

			<?php 
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar( 'sidebar-1' ); } ?>
	</div>
</div><!-- #secondary -->
