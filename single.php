<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	if ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
		$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );
		the_post_navigation(
			array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' .
				esc_html__( 'Next Post', 'twentytwentyone' ) . $twentytwentyone_next . '</span> ' .
				'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'twentytwentyone' ) . '</span>' .
				'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true"> ' . $twentytwentyone_prev . esc_html__( 'Previous Post', 'twentytwentyone' ) . '</span> ' .
				'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'twentytwentyone' ) . '</span>' .
				'<span class="post-title">%title</span>',
			)
		);
	}

endwhile; // End of the loop.

get_footer();
