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
		'widgets'   => array(
			// Place core-defined widgets in the footer widget area.
			'sidebar-1' => array(
				'text_business_info',
				'text_about',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'     => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'A new default theme for WordPress', 'Theme starter content', 'twentytwentyone' ),
				'post_content' => '
				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column {"width":98} -->
				<div class="wp-block-column" style="flex-basis:98%"><!-- wp:paragraph {"fontSize":"huge","style":{"typography":{"lineHeight":"1.1"}}} -->
				<p class="has-huge-font-size" style="line-height:1.1">' . esc_html_x( 'A new default theme for WordPress', 'Theme starter content', 'twentytwentyone' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				<!-- wp:column {"width":2} -->
				<div class="wp-block-column" style="flex-basis:2%"></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-style-twentytwentyone-columns-overlap"} -->
				<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-twentytwentyone-columns-overlap"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"full","sizeSlug":"full"} -->
				<figure class="wp-block-image alignfull size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_smoker.png" alt="' . esc_attr__( '&quot;The Smoker&quot; by Vincent Van Gogh (1888)', 'twentytwentyone' ) . '"/></figure>
				<!-- /wp:image -->
				<!-- wp:spacer -->
				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:image {"align":"full","sizeSlug":"full"} -->
				<figure class="wp-block-image alignfull size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/irises.png" alt="' . esc_attr__( '&quot;Irises&quot; by Vincent Van Gogh (1890)', 'twentytwentyone' ) . '"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:spacer -->
				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:image {"className":"alignfull size-full"} -->
				<figure class="wp-block-image alignfull size-full">
				<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/girl_in_white.png" alt="' . esc_attr__( '&quot;Girl in White&quot; by Vincent Van Gogh (1890)', 'twentytwentyone' ) . '"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				<!-- wp:heading {"align":"center","fontSize":"huge"} -->
				<h2 class="has-text-align-center has-huge-font-size">' . esc_html_x( 'Create your website with blocks', 'Theme starter content', 'twentytwentyone' ) . '</h2>
				<!-- /wp:heading -->
				<!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading -->
				<h2>' . esc_html_x( 'Add unique block patterns to your layout', 'Theme starter content', 'twentytwentyone' ) . '</h2>
				<!-- /wp:heading -->
				<!-- wp:spacer {"height":40} -->
				<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size">' . esc_html_x( 'To add a pattern, select Add block in the toolbar, and open the patterns tab.', 'Theme starter content', 'twentytwentyone' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:media-text {"mediaId":1747,"mediaType":"image","mediaWidth":36,"isStackedOnMobile":false,"className":"is-stacked-on-mobile"} -->
				<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:36% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/la_mousme.jpg" alt="' . esc_attr__( '&quot;La Mousmé&quot; by Vincent Van Gogh (1888)', 'twentytwentyone' ) . '" class="wp-image-1747 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:image {"align":"center","width":400,"height":512,"className":"size-large is-style-twentytwentyone-image-frame"} -->
				<div class="wp-block-image size-large is-style-twentytwentyone-image-frame"><figure class="aligncenter is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_berceuse_woman-rocking_a_cradle.jpg" alt="' . esc_attr__( '&quot;The Berceuse, Woman Rocking a Cradle&quot; by Vincent Van Gogh (1889)', 'twentytwentyone' ) . '" width="400" height="512"/></figure></div>
				<!-- /wp:image --></div></div>
				<!-- /wp:media-text --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				<!-- wp:heading -->
				<h2>' . esc_html_x( 'Mix borders and overlaps', 'Theme starter content', 'twentytwentyone' ) . '</h2>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p></p>
				<!-- /wp:paragraph -->
				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"bottom"} -->
				<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:spacer {"height":50} -->
				<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:image {"id":12,"sizeSlug":"large","linkDestination":"none","className":"is-style-twentytwentyone-image-frame"} -->
				<figure class="wp-block-image size-large is-style-twentytwentyone-image-frame"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_poplars_at_saint_remy.jpg" alt="' . esc_attr__( '&quot;The Poplars at Saint-Rémy&quot; by Vincent Van Gogh (1889)', 'twentytwentyone' ) . '" class="wp-image-12"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"id":2419,"sizeSlug":"large","linkDestination":"none","className":"is-style-twentytwentyone-border"} -->
				<figure class="wp-block-image size-large is-style-twentytwentyone-border"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/roses_b.jpg" alt="' . esc_attr__( '&quot;Roses&quot; by Vincent Van Gogh (1890)', 'twentytwentyone' ) . '" class="wp-image-2419"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				',
			),
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'   => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
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

			// Assign a menu to the "footer" location.
			'footer'  => array(
				'name'  => esc_html__( 'Footer', 'twentytwentyone' ),
				'items' => array(
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
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
