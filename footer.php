<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gagasan
 */
?>
		</div><!-- .inner-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner--container wrap">
			<div class="site-info">
				<p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'gagasan' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'gagasan' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'gagasan' ), 'gagasan', '<a href="http://fikrirasyid.com/" rel="designer">Fikri Rasyid</a>' ); ?></p>
				<a href="#" id="scrollup" class="circle scroll-to-top"></a>
			</div><!-- .site-info -->
		</div><!-- .inner-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
