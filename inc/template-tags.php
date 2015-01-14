<?php
/**
 * Gagasan site title
 * 
 * Use markup for site title appropriately
 */
if ( ! function_exists( 'gagasan_site_title' ) ) :
function gagasan_site_title(){
	if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php endif;		
}
endif;

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gagasan
 */

if ( ! function_exists( 'gagasan_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function gagasan_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'gagasan' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Discover more&nbsp;<span class="meta-nav">&rarr;</span>', 'gagasan' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;&nbsp;</span>Newer ideas', 'gagasan' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
if ( ! function_exists( 'gagasan_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function gagasan_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'gagasan' ); ?></h1>
		<div class="nav-links clear">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x('<hgroup><span class="section-title">Previous</span><span class="post-title">%title</span></hgroup>', 'Previous post link', 'gagasan' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<hgroup><span class="section-title">Next</span><span class="post-title">%title</span></hgroup>', 'Next post link',     'gagasan' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'gagasan_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function gagasan_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'gagasan' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'gagasan_author' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function gagasan_author() {
	$byline = sprintf(
		_x( 'Written by %s', 'post author', 'gagasan' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'gagasan_category_link' ) ) :
/**
 * Prints HTML with meta information for the Categories.
 */
function gagasan_category_link() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'gagasan' ) );
		if ( $categories_list && gagasan_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="section-title">' . __( 'Filled under', 'gagasan' ) . '</span> %1$s </span>', $categories_list );
		}
	}
}
endif;

if ( ! function_exists( 'gagasan_comments' ) ) :
/**
 * Prints HTML with meta information for the Comments.
 */
function gagasan_comments() {
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'gagasan' ), __( '1 Comment', 'gagasan' ), __( '% Comments', 'gagasan' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'gagasan' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'gagasan_tags_links' ) ) :
/**
 * Prints HTML with meta information for the Tags.
 */
function gagasan_tags_links() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' ', 'gagasan' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="section-title">' . __( 'Tagged', 'gagasan' ) . '</span> %1$s</span>', $tags_list );
		}
	}
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'gagasan' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'gagasan' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'gagasan' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'gagasan' ), get_the_date( _x( 'Y', 'yearly archives date format', 'gagasan' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'gagasan' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'gagasan' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'gagasan' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'gagasan' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'gagasan' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'gagasan' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'gagasan' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'gagasan' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'gagasan' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function gagasan_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'gagasan_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'gagasan_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so gagasan_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so gagasan_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in gagasan_categorized_blog.
 */
function gagasan_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'gagasan_categories' );
}
add_action( 'edit_category', 'gagasan_category_transient_flusher' );
add_action( 'save_post',     'gagasan_category_transient_flusher' );
