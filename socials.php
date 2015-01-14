<?php
/**
* The template for displaying Social Links.
*
* @package Gagasan
* @Since 1.0.0
*
*/	
$dribbble_link = get_theme_mod( 'gagasan_dribbble_link' );
$facebook_link = get_theme_mod( 'gagasan_facebook_link' );
$flickr_link = get_theme_mod( 'gagasan_flickr_link' );
$github_link = get_theme_mod( 'gagasan_github_link' );
$google_plus_link = get_theme_mod( 'gagasan_google_plus_link' );
$linkedin_link = get_theme_mod( 'gagasan_linkedin_link' );
$pinterest_link = get_theme_mod( 'gagasan_pinterest_link' );
$rss_link = get_theme_mod( 'gagasan_rss_link' );
$tumblr_link = get_theme_mod( 'gagasan_tumblr_link' );
$twitter_link = get_theme_mod( 'gagasan_twitter_link' );
$vimeo_link = get_theme_mod( 'gagasan_vimeo_link' );
$youtube_link = get_theme_mod( 'gagasan_youtube_link' );
$social_links = ( '' != $dribbble_link
		|| '' != $facebook_link
		|| '' != $flickr_link		
		|| '' != $github_link
		|| '' != $google_plus_link		
		|| '' != $linkedin_link
		|| '' != $pinterest_link
		|| '' != $rss_link
		|| '' != $tumblr_link		
		|| '' != $twitter_link
		|| '' != $vimeo_link
		|| '' != $youtube_link		
	) ? true : false;
?>

<?php if ( $social_links ) : ?>
	<div class="social-container">
		<ul class="social-links">

			<?php if ( '' != $dribbble_link ) : ?>
			<li class="dribbble-link">
				<a href="<?php echo esc_url( $dribbble_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Dribbble', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Dribbble', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $facebook_link ) : ?>
			<li class="facebook-link">
				<a href="<?php echo esc_url( $facebook_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Facebook', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Facebook', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $flickr_link ) : ?>
			<li class="flickr-link">
				<a href="<?php echo esc_url( $flickr_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Flickr', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Flickr', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>	

			<?php if ( '' != $github_link ) : ?>
			<li class="github-link">
				<a href="<?php echo esc_url( $github_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Github', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Github', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $google_plus_link ) : ?>
			<li class="google-plus-link">
				<a href="<?php echo esc_url( $google_plus_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Google Plus', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Google Plus', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>			

			<?php if ( '' != $linkedin_link ) : ?>
			<li class="linkedin-link">
				<a href="<?php echo esc_url( $linkedin_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'LinkedIn', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'LinkedIn', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $pinterest_link ) : ?>
			<li class="pinterest-link">
				<a href="<?php echo esc_url( $pinterest_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Pinterest', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Pinterest', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $rss_link ) : ?>
			<li class="rss-link">
				<a href="<?php echo esc_url( $rss_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'RSS', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'RSS', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $tumblr_link ) : ?>
			<li class="tumblr-link">
				<a href="<?php echo esc_url( $tumblr_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Tumblr', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Tumblr', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $twitter_link ) : ?>
			<li class="twitter-link">
				<a href="<?php echo esc_url( $twitter_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Twitter', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Twitter', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $vimeo_link ) : ?>
			<li class="vimeo-link">
				<a href="<?php echo esc_url( $vimeo_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Vimeo', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Vimeo', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $youtube_link ) : ?>
			<li class="youtube-link">
				<a href="<?php echo esc_url( $youtube_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Youtube', 'gagasan' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Youtube', 'gagasan' ); ?></span>
				</a>
			</li>
			<?php endif; ?>	

		</ul><!-- .social-links -->
	</div><!-- .social-container -->
<?php endif; // end if social links ?>
