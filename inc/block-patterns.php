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
 *
 * WIP
 *
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'twentytwentyone',
		array( 'label' => __( 'Twenty Twenty-One', 'twentytwentyone' ) )
	);
}
 */

/**
 * Register Block Patterns.
 *
 * WIP
 *
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'',
		array(
			'title'      => __( '', 'twentytwentyone' ),
			'categories' => array( 'twentytwentyone' ),
			'content'    => '',
		)
	);

}
 */
