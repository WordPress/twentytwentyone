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

add_action(
	'customize_register',
	function( $wp_customize ) {
		include_once get_theme_file_path( 'inc/palette-color-picker-control/src/Control/class-twenty-twenty-one-colorpicker.php' );
		$wp_customize->add_control(
			new Twenty_Twenty_One_ColorPicker(
				$wp_customize,
				'background_color',
				array(
					'label'   => esc_html__( 'Background Control', 'twentytwentyone' ),
					'section' => 'colors',
					'choices' => array(
						'colors' => array( '#000000', '#28303D', '#39414D', '#D1E4DD', '#D1DFE4', '#D1D1E4', '#E4D1D1', '#E4DAD1', '#EEEADD', '#FFFFFF' ),
					),
				)
			)
		);
	}
);
