<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package gagasan
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gagasan' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="inner--container wrap">
			<div class="site-branding">
				<?php gagasan_site_title(); ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle button--menu" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'gagasan' ); ?></button>
				<?php 
					wp_nav_menu( array( 
						'theme_location'  => 'primary',
						'container_class' => 'primary-nav clear',
						'menu_id'         => 'navbar',
						'menu_class'	  => 'nav-menu'
					    ) );
				    ?>
			</nav><!-- #site-navigation -->
			<?php endif; //has_nav_menu ?>
		</div><!-- .inner-container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="inner--container wrap">