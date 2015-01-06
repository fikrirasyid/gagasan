<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @package Gagasan
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses gagasan_header_style()
 * @uses gagasan_admin_header_style()
 * @uses gagasan_admin_header_image()
 */
function gagasan_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'gagasan_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/gagasan-default-header.jpg',
		'width'                  => 1440,
		'height'                 => 450,
		'wp-head-callback'       => 'gagasan_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'gagasan_custom_header_setup' );

if ( ! function_exists( 'gagasan_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see gagasan_custom_header_setup().
 */
function gagasan_header_style() {
	$header_image = get_header_image();

	// Fallback to default image
	if( ! $header_image ){
		$header_image = get_template_directory_uri() . '/images/gagasan-default-header.jpg';
	}

	// Header image on page and single page is defined by featured image
	if ( is_singular() || is_page() ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		#page .page-header .background{
			background: url( <?php echo $header_image; ?> ) no-repeat center center; 
			background-size: cover;
		}
	</style>
	<?php
}
endif; // gagasan_header_style