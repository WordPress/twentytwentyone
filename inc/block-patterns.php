<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'twentytwentyone',
		array( 'label' => esc_html__( 'Twenty Twenty-One', 'twentytwentyone' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Large Text.
	register_block_pattern(
		'twentytwentyone/large-text',
		array(
			'title'         => esc_html__( 'Large Text', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:columns {"align":"wide"} --><div class="wp-block-columns alignwide"><!-- wp:column {"width":98} --><div class="wp-block-column" style="flex-basis:98%"><!-- wp:paragraph {"fontSize":"gigantic","style":{"typography":{"lineHeight":"1.1"}}} --><p class="has-gigantic-font-size" style="line-height:1.1">' . esc_html__( 'A new portfolio default theme for WordPress', 'twentytwentyone' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {"width":2} --><div class="wp-block-column" style="flex-basis:2%"></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:paragraph --><p></p><!-- /wp:paragraph -->',
		)
	);

	// Links Area.
	register_block_pattern(
		'twentytwentyone/links-area',
		array(
			'title'         => esc_html__( 'Links Area', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'description'   => _x( 'A huge text followed by social networks and email address links.', 'Block pattern description', 'twentytwentyone' ),
			'content'       => '<!-- wp:cover {"overlayColor":"green","contentPosition":"center center","align":"wide","className":"is-style-twentytwentyone-border"} --><div class="wp-block-cover alignwide has-green-background-color has-background-dim is-style-twentytwentyone-border"><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":20} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer --><!-- wp:paragraph {"fontSize":"huge"} --><p class="has-huge-font-size">' . wp_kses_post( __( 'Let&#8217;s Connect.', 'twentytwentyone' ) ) . '</p><!-- /wp:paragraph --><!-- wp:spacer {"height":75} --><div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer --><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p><a href="#" data-type="URL">' . esc_html__( 'Twitter', 'twentytwentyone' ) . '</a> / <a href="#" data-type="URL">' . esc_html__( 'Instagram', 'twentytwentyone' ) . '</a> / <a href="#" data-type="URL">' . esc_html__( 'Dribbble', 'twentytwentyone' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p><a href="#">' . esc_html__( 'example@example.com', 'twentytwentyone' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:spacer {"height":20} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer --></div></div><!-- /wp:cover --><!-- wp:paragraph --><p></p><!-- /wp:paragraph -->',
		)
	);

	// Media & Text Article Title.
	register_block_pattern(
		'twentytwentyone/media-text-article-title',
		array(
			'title'         => esc_html__( 'Media & Text Article Title', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'description'   => _x( 'A Media & Text block with a big image on the left and a heading on the right. The heading is followed by a separator and a description paragraph.', 'Block pattern description', 'twentytwentyone' ),
			'content'       => '<!-- wp:media-text {"mediaId":1752,"mediaLink":"' . esc_url( get_template_directory_uri() ) . '/assets/images/the_poplars_at_saint_remy.jpg","mediaType":"image","className":"is-style-twentytwentyone-border"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile is-style-twentytwentyone-border"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_poplars_at_saint_remy.jpg" alt="' . esc_attr__( '&quot;The Poplars at Saint-Rémy&quot; by Vincent Van Gogh (1889)', 'twentytwentyone' ) . '" class="wp-image-1752"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"align":"center"} --><h2 class="has-text-align-center">' . wp_kses_post( __( 'The Poplars at<br>Saint-Rémy', 'twentytwentyone' ) ) . '</h2><!-- /wp:heading --><!-- wp:separator --><hr class="wp-block-separator"/><!-- /wp:separator --><!-- wp:paragraph {"align":"center","fontSize":"small"} --><p class="has-text-align-center has-small-font-size">' . wp_kses_post( __( 'Vincent van Gogh<br>(Dutch, 1853-1890)', 'twentytwentyone' ) ) . '</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text -->',
		)
	);

	// Two Images Showcase.
	register_block_pattern(
		'twentytwentyone/two-images-showcase',
		array(
			'title'         => esc_html__( 'Two Images Showcase', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'description'   => _x( 'A Media & Text block with a big image on the left and a smaller one with bordered frame on the right.', 'Block pattern description', 'twentytwentyone' ),
			'content'       => '<!-- wp:media-text {"mediaId":1747,"mediaLink":"' . esc_url( get_template_directory_uri() ) . '/assets/images/la_mousme.jpg","mediaType":"image"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/la_mousme.jpg" alt="' . esc_attr__( '&quot;La Mousmé&quot; by Vincent Van Gogh (1888)', 'twentytwentyone' ) . '" size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:image {"align":"center","width":400,"height":512,"sizeSlug":"large","className":"is-style-twentytwentyone-image-frame"} --><figure class="wp-block-image aligncenter size-large is-resized is-style-twentytwentyone-image-frame"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_berceuse_woman-rocking_a_cradle.jpg" alt="' . esc_attr__( '&quot;The Berceuse, Woman Rocking a Cradle&quot; by Vincent Van Gogh (1889)', 'twentytwentyone' ) . '" width="400" height="512"/></figure><!-- /wp:image --></div></div><!-- /wp:media-text -->',
		)
	);
}
