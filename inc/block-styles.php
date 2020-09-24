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
	/**
	 * Register block styles.
	 *
	 * @return void
	 */
	function twenty_twenty_one_register_block_styles() {
		register_block_style(
			'core/image',
			array(
				'name'  => 'twentytwentyone-image-frame',
				'label' => __( 'Image Frame', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Thick Border', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/cover',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Thick Border', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Thick Border', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/media-text',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Thick Border', 'twentytwentyone' ),
			)
		);
	}
	add_action( 'init', 'twenty_twenty_one_register_block_styles' );
}
