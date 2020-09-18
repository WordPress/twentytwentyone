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

if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'twentytwentyone',
		array( 'label' => __( 'Twenty Twenty One', 'twentytwentyone' ) )
	);
}
 */

/**
 * Register Block Patterns.

if ( function_exists( 'register_block_pattern' ) ) {

	/**
	 * WIP
	register_block_pattern(
		'twentytwentyone/group-image-overlap2',
		array(
			'title'      => __( 'Group with Image Overlap2', 'twentytwentyone' ),
			'categories' => array( 'twentytwentyone' ),
			'content'    => '
			<!-- wp:group {"align":"full","className":"is-style-overflow"} -->
			<div class="wp-block-group alignfull is-style-overflow"><div class="wp-block-group__inner-container"><!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":2011,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( 'the_smoker_735.png' ) . '" alt="" class="wp-image-2011"/></figure>
			<!-- /wp:image -->

			<!-- wp:image {"id":2010,"width":615,"height":488,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img src="' . esc_url( 'irises_820.png' ) . '" alt="" class="wp-image-2010" width="615" height="488"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":2009,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( 'girl_in_white_759.png' ) . '" alt="" class="wp-image-2009"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->
			',
		)
	);

}
 */