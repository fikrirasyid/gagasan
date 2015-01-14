<?php
/**
 * gagasan Theme Customizer
 *
 * @package gagasan
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gagasan_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Logo Section
	$wp_customize->add_section( 
		'gagasan_logo_image', array(
			'priority'    			=> 2,
			'title'       			=> __( 'Upload Avatar', 'gagasan' ),
			'description' 			=> __( 'Add avatar/personal logo to your blog. You can use either Gravatar or upload your custom avatar by choosing options below.', 'gagasan' ),
		)
	);
    
	// Use Gravatar Setting
	$wp_customize->add_setting( 
		'gagasan_use_gravatar', array(
			'default' 				=> '',
			'sanitize_callback' 	=> 'gagasan_sanitize_checkbox',
		)
	);
			
	$wp_customize->add_control( 
		'gagasan_use_gravatar', array(
			'label'    				=> __( 'Use gravatar', 'gagasan' ),
			'section'  				=> 'gagasan_logo_image',
			'type'    				=> 'checkbox',
			'description'			=> __('To use Gravatar simply check options above and write your Gravatar email address in the box below.', 'gagasan'),				
		)
	);

	// Gravatar Email Setting
	$wp_customize->add_setting( 
		'gravatar_email', array(
			'default'           	=> '',
			'sanitize_callback' 	=> 'is_email',
		)
	);

	$wp_customize->add_control( 
		'gravatar_email', array(
			'label'             	=> '',
			'section'           	=> 'gagasan_logo_image',
			'type'              	=> 'text',
		)
	);

	$wp_customize->add_setting( 
		'gagasan_logo_image', array(
			'default'		 		=>  '',
			'type'              	=> 'theme_mod',
			'capability'        	=> 'edit_theme_options',
			'sanitize_callback' 	=> 'esc_url_raw',
		)
	);
				    
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 
			'gagasan_logo_images', array(
				'label'    		=> __( 'Self Upload', 'gagasan' ),
				'section'  		=> 'gagasan_logo_image',
				'settings' 		=> 'gagasan_logo_image',
				'description' 	=> __( 'Upload your custom avatar/logo by clicking select image button below. Gagasan theme recommends avatar/logo size 200x200 pixels.', 'gagasan' )
				)
			)
	);

	// Excerpt Options
	$wp_customize->add_section( 'gagasan_post_excerpts', array(
		'priority'    			=> 3,
		'title'       			=> __( 'Post Excerpts', 'gagasan' ),
		'description' 			=> __( 'Auto generate excerpts.', 'gagasan' ),
		)
	);

	$wp_customize->add_setting( 'gagasan_excerpt_options', array(
		'default' 				=> '',
		'sanitize_callback' 	=> 'gagasan_sanitize_checkbox',
		)
	);
			
	$wp_customize->add_control( 'gagasan_excerpt_options', array(
		'label'    				=> __( 'Use excerpts', 'gagasan' ),
		'section'  				=> 'gagasan_post_excerpts',
		'type'    				=> 'checkbox',
		'description'			=> __('Enabling this option will generate auto excerpt to your blog.', 'gagasan'),				
		)
	);
						
	// Social Links
	$wp_customize->add_section( 'gagasan_social_links', array(
		'priority'    			=> 4,
		'title'       			=> __( 'Social Links', 'gagasan' ),
		'description' 			=> __( 'Add social links to your blog.', 'gagasan' ),
		)
	);
	
	$wp_customize->add_setting( 'gagasan_dribbble_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_dribbble_link', array(
		'label'             	=> __( 'Dribbble Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 1,
		)
	);

	$wp_customize->add_setting( 'gagasan_facebook_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_facebook_link', array(
		'label'             	=> __( 'Facebook Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 2,
		)
	);

	$wp_customize->add_setting( 'gagasan_flickr_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_flickr_link', array(
		'label'             	=> __( 'Flickr Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 3,
		)
	);

	$wp_customize->add_setting( 'gagasan_github_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_github_link', array(
		'label'             	=> __( 'Github Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 4,
		)
	);

	$wp_customize->add_setting( 'gagasan_linkedin_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_linkedin_link', array(
		'label'             	=> __( 'LinkedIn Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 5,
		)
	);	

	$wp_customize->add_setting( 'gagasan_pinterest_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_pinterest_link', array(
		'label'             	=> __( 'Pinterest Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 6,
		)
	);	

	$wp_customize->add_setting( 'gagasan_rss_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_rss_link', array(
		'label'             	=> __( 'RSS Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 7,
		)
	);	

	$wp_customize->add_setting( 'gagasan_tumblr_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_tumblr_link', array(
		'label'             	=> __( 'Tumblr Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 8,
		)
	);	

	$wp_customize->add_setting( 'gagasan_twitter_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_twitter_link', array(
		'label'             	=> __( 'Twitter Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 9,
		)
	);

	$wp_customize->add_setting( 'gagasan_vimeo_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_vimeo_link', array(
		'label'             	=> __( 'Vimeo Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 10,
		)
	);	

	$wp_customize->add_setting( 'gagasan_youtube_link', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'gagasan_youtube_link', array(
		'label'             	=> __( 'Youtube Link', 'gagasan' ),
		'section'           	=> 'gagasan_social_links',
		'type'              	=> 'text',
		'priority'          	=> 11,
		)
	);	

}
add_action( 'customize_register', 'gagasan_customize_register' );

/**
 * Gravatar as logo.
 * Use the admin email's gravatar or gravatar_email text field.
 */
function gagasan_gravatar_logo() {
	// Get default from Discussion Settings.
	$default = get_option( 'avatar_default', 'mystery' ); // Mystery man default
	if ( 'mystery' == $default )
		$default = 'mm';
	elseif ( 'gravatar_default' == $default )
		$default = '';

	$protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';

	if ( ( get_option( 'admin_email' ) != get_theme_mod( 'gravatar_email' ) ) && is_email( get_theme_mod( 'gravatar_email' ) ) )
		$email = get_theme_mod( 'gravatar_email' );
	else
		$email = get_option( 'admin_email' );

	$url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( $email ) );
	$url = add_query_arg( array(
		's' => 120,
		'd' => urlencode( $default ),
	), $url );

	return esc_url_raw( $url );
}

/**
 * Callback function for sanitizing checkbox settings.
 */
function gagasan_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gagasan_customize_preview_js() {
	wp_enqueue_script( 'gagasan_customizer', 
		get_template_directory_uri() . '/js/customizer.js', array( 
			'customize-preview' ), 
		'20130508', 
		true 
	);
}
add_action( 'customize_preview_init', 'gagasan_customize_preview_js' );
