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
		array( 'label' => __( 'Twenty Twenty One', 'twentytwentyone' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'twentytwentyone/group-split-background',
		array(
			'title'      => __( 'Group with Split Background', 'twentytwentyone' ),
			'categories' => array( 'twentytwentyone' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"gradient\":\"hard-diagonal\"} -->\n<div class=\"wp-block-group alignfull has-hard-diagonal-gradient-background has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div></div>\n<!-- /wp:group -->",
		)
	);
	register_block_pattern(
		'twentytwentyone/group-image-overlap',
		array(
			'title'      => __( 'Group with Image Overlap', 'twentytwentyone' ),
			'categories' => array( 'twentytwentyone' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"className\":\"is-style-overflow\",\"gradient\":\"stripe\"} -->\n<div class=\"wp-block-group alignfull is-style-overflow has-stripe-gradient-background has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);
	register_block_pattern(
		'twentytwentyone/latest-posts-alternating-grid',
		array(
			'title'      => __( 'Alternating Grid of Latest Posts', 'twentytwentyone' ),
			'categories' => array( 'twentytwentyone' ),
			'content'    => '<!-- wp:latest-posts {"displayPostContent":true,"columns":5,"className":"is-style-tto-alternating-grid"} /-->',
		)
	);

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
	*/
}
