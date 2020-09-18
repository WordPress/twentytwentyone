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

/**
 * Register custom control for background-color and pass a custom palette to it.
 *
 * @since 1.0
 *
 * @param WP_Customize_Base $wp_customize The customizer object.
 *
 * @return void
 */
function twenty_twenty_one_customize_background_color( $wp_customize ) {

	// Include the custom control class.
	include_once get_theme_file_path( 'classes/class-twenty-twenty-one-customize-color-control.php' );

	// Register the custom control.
	$wp_customize->register_control_type( 'Twenty_Twenty_One_Customize_Color_Control' );

	// Get the palette from theme-supports.
	$palette = get_theme_support( 'editor-color-palette' );

	// Build the colors array from our theme-support.
	$colors = array();
	if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
		foreach ( $palette[0] as $palette_color ) {
			$colors[] = $palette_color['color'];
		}
	}

	// Add the control. Overrides the default background-color control.
	$wp_customize->add_control(
		new Twenty_Twenty_One_Customize_Color_Control(
			$wp_customize,
			'background_color',
			array(
				'label'   => esc_html__( 'Background Control', 'twentytwentyone' ),
				'section' => 'colors',
				'palette' => $colors,
			)
		)
	);
}
add_action( 'customize_register', 'twenty_twenty_one_customize_background_color' );
