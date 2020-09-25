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
		array( 'label' => __( 'Twenty Twenty-One', 'twentytwentyone' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'twentytwentyone/two-images-showcase',
		array(
			'title'         => __( 'Two Images Showcase', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:media-text {"mediaId":1747,"mediaLink":"' . esc_url( get_template_directory_uri() ) . '/assets/images/la_mousme.jpg","mediaType":"image"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/la_mousme.jpg" alt="' . esc_attr__( '&quot;La Mousmé&quot; by Vincent Van Gogh (1888)', 'twentytwentyone' ) . '" size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:image {"align":"center","width":400,"height":512,"sizeSlug":"large","className":"is-style-twentytwentyone-image-frame"} --><figure class="wp-block-image aligncenter size-large is-resized is-style-twentytwentyone-image-frame"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_berceuse_woman-rocking_a_cradle.jpg" alt="' . esc_attr__( '&quot;The Berceuse, Woman Rocking a Cradle&quot; by Vincent Van Gogh (1889)', 'twentytwentyone' ) . '" width="400" height="512"/></figure><!-- /wp:image --></div></div><!-- /wp:media-text -->',
		)
	);

	register_block_pattern(
		'twentytwentyone/media-text-article-title',
		array(
			'title'         => __( 'Media & Text Article Title', 'twentytwentyone' ),
			'categories'    => array( 'twentytwentyone' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:media-text {"mediaId":1752,"mediaLink":"' . esc_url( get_template_directory_uri() ) . '/assets/images/the_poplars_at_saint_remy.jpg","mediaType":"image","className":"is-style-twentytwentyone-border"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile is-style-twentytwentyone-border"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/the_poplars_at_saint_remy.jpg" alt="&quot;The Poplars at Saint-Rémy&quot; by Vincent Van Gogh (1889)" class="wp-image-1752 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"align":"center"} --><h2 class="has-text-align-center">The Poplars at <br>Saint-Rémy</h2><!-- /wp:heading --><!-- wp:separator --><hr class="wp-block-separator"/><!-- /wp:separator --><!-- wp:paragraph {"align":"center","fontSize":"small"} --><p class="has-text-align-center has-small-font-size">Vincent van Gogh<br>(Dutch, 1853-1890)</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text -->',
		)
	);

}
