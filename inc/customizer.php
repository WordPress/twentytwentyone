<?php
/**
 * Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function twenty_twenty_one_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function twenty_twenty_one_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
