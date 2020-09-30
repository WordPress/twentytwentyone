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
				'label' => __( 'Bordered Frame', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Bordered', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/cover',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Bordered', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Bordered', 'twentytwentyone' ),
			)
		);

		register_block_style(
			'core/media-text',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => __( 'Bordered', 'twentytwentyone' ),
			)
		);

		/* Latest Posts: Dividers */
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'twentytwentyone-latest-posts-dividers',
				'label' => __( 'Dividers', 'twentytwentyone' ),
			)
		);

		/* Latest Posts: Borders */
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'twentytwentyone-latest-posts-borders',
				'label' => __( 'Borders', 'twentytwentyone' ),
			)
		);
	}
	add_action( 'init', 'twenty_twenty_one_register_block_styles' );
}
