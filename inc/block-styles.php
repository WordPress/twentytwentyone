<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function twenty_twenty_one_register_block_styles() {

		/**
		 * Register block styles
		 */
		register_block_style(
			'core/latest-posts',
			array(
				'name'         => 'twenty-twenty-one-alternating-grid',
				'label'        => __( 'Alternating Grid', 'twentytwentyone' ),
				'style_handle' => 'twenty-twenty-one-alternating-grid',
			)
		);

	}

	add_action( 'init', 'twenty_twenty_one_register_block_styles' );
}
