<?php
/**
 * Twenty Twenty-One Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `twentytwenty_starter_content` filter before returning.
 *
 * @since 1.0.0
 *
 * @return array A filtered array of args for the starter_content.
 */
function twenty_twenty_one_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place one core-defined widgets in the first footer widget area.
			'sidebar-1' => array(
				'text_about',
			),
			// Place one core-defined widgets in the second footer widget area.
			'sidebar-2' => array(
				'text_business_info',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-opening' => array(
				'post_title' => _x( 'A new portfolio default theme for WordPress', 'Theme starter content', 'twentytwentyone' ),
				'file'       => 'assets/images/the_smoker.jpg', // URL relative to the template directory.
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html__( 'A new portfolio default theme for WordPress', 'twentytwentyone' ),
				// Use the above featured image with the predefined about page.

				/*
				 * twentytwentyone-overlap-right styles that needs to be added to the overlapping image:
				 * for now you can add it to the customizer css.
				 * .twentytwentyone-overlap-right {position: relative;
				 *  margin-left: 25%;
				 *  margin-right: -55%;}
				*/
				'thumbnail'    => '{{image-opening}}',
				'post_content' => '<!-- wp:group {"align":"full","className":"is-style-overflow"} -->
						<div class="wp-block-group alignfull is-style-overflow"><div class="wp-block-group__inner-container"><!-- wp:columns {"align":"wide"} -->
						<div class="wp-block-columns alignwide"><!-- wp:column -->
						<div class="wp-block-column"><!-- wp:image {"id":2011,"sizeSlug":"large"} -->
						<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri() . '/assets/images/the_smoker.png' ) . '" alt="" class="wp-image-2011"/></figure>
						<!-- /wp:image -->

						<!-- wp:image {"id":2010,"width":615,"height":488,"sizeSlug":"large","className":"twentytwentyone-overlap-right"} -->
						<figure class="wp-block-image size-large is-resized twentytwentyone-overlap-right"><img src="' . esc_url( get_theme_file_uri() . '/assets/images/irises.png' ) . '" alt="" class="wp-image-2010" width="615" height="488"/></figure>
						<!-- /wp:image --></div>
						<!-- /wp:column -->

						<!-- wp:column {"verticalAlignment":"center"} -->
						<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":2009,"sizeSlug":"large"} -->
						<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri() . '/assets/images/girl_in_white.png' ) . '" alt="" class="wp-image-2009"/></figure>
						<!-- /wp:image --></div>
						<!-- /wp:column --></div>
						<!-- /wp:columns --></div></div>
						<!-- /wp:group -->
					',
			),
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name'  => esc_html__( 'Primary', 'twentytwentyone' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'twenty_twenty_one_starter_content', $starter_content );
}
