<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Remove Gutenberg `Theme` Block Styles
 */
function twenty_twenty_one_deregister_styles() {
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_print_styles', 'twenty_twenty_one_deregister_styles', 100 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function twenty_twenty_one_body_classes( $classes ) {

	if ( is_singular() ) {
		// Adds `singular` to singular pages.
		$classes[] = 'singular';
	} else {
		// Adds `hfeed` to non singular pages.
		$classes[] = 'hfeed';
	}

	// Add a body class if main navigation is active.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-main-navigation';
	}

	return $classes;
}
add_filter( 'body_class', 'twenty_twenty_one_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 */
function twenty_twenty_one_post_classes( $classes, $class, $post_id ) {
	$classes[] = 'entry';

	return $classes;
}
add_filter( 'post_class', 'twenty_twenty_one_post_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function twenty_twenty_one_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'twenty_twenty_one_pingback_header' );

/**
 * Changes comment form default fields.
 */
function twenty_twenty_one_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'twenty_twenty_one_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function twenty_twenty_one_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwentyone' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwentyone' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'twentytwentyone' ) . '<span class="page-description">' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt = get_post_type_object( get_queried_object()->name );
		/* translators: %s: Post type singular name */
		$title = sprintf( esc_html__( '%s Archives', 'twentytwentyone' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: %s: Taxonomy singular name */
		$title = sprintf( esc_html__( '%s Archives', 'twentytwentyone' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'twentytwentyone' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'twenty_twenty_one_get_the_archive_title' );

/**
 * Determines if post thumbnail can be displayed.
 */
function twenty_twenty_one_can_show_post_thumbnail() {
	return apply_filters( 'twenty_twenty_one_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function twenty_twenty_one_get_avatar_size() {
	return 60;
}

/**
 * Returns true if comment is by author of the post.
 *
 * @see get_comment_class()
 */
function twenty_twenty_one_is_comment_by_post_author( $comment = null ) {
	if ( is_object( $comment ) && $comment->user_id > 0 ) {
		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );
		if ( ! empty( $user ) && ! empty( $post ) ) {
			return $comment->user_id === $post->post_author;
		}
	}
	return false;
}

/**
 * Create the continue reading link.
 */
function twenty_twenty_one_continue_reading_link() {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Read more %s', 'twentytwentyone' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">' . __( 'about ', 'twentytwentyone' ), '</span>', false )
		);

		return '&hellip; <a class="more-link" href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'twenty_twenty_one_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'twenty_twenty_one_continue_reading_link' );


if ( ! function_exists( 'twenty_twenty_one_post_title' ) ) {
	/**
	 * Add a title to posts that are missing titles.
	 */
	function twenty_twenty_one_post_title( $title ) {
		if ( $title == '' ) {
			return esc_html__( 'Untitled', 'twentytwentyone' );
		} else {
			return $title;
		}
	}

	add_filter( 'the_title', 'twenty_twenty_one_post_title' );
}
