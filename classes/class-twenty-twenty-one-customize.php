<?php
/**
 * Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

if ( ! class_exists( 'Twenty_Twenty_One_Customize' ) ) {
	/**
	 * CUSTOMIZER SETTINGS
	 */
	class Twenty_Twenty_One_Customize {

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return void
		 */
		public static function register( $wp_customize ) {

			/**
			 * Site Title & Description.
			 * */
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage'; // @phpstan-ignore-line. We will assume that this setting exist.
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage'; // @phpstan-ignore-line. We will assume that this setting exist.

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title',
					'render_callback' => 'twenty_twenty_one_customize_partial_blogname',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'twenty_twenty_one_customize_partial_blogdescription',
				)
			);

			/**
			 * Site Identity
			 */

			$wp_customize->add_setting(
				'display_title_and_tagline',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'display_title_and_tagline',
				array(
					'type'    => 'checkbox',
					'section' => 'title_tagline',
					'label'   => __( 'Display Site Title & Tagline', 'twentytwentyone' ),
				)
			);

			/**
			 * Add excerpt or full text selector to customizer
			 */

			$wp_customize->add_section( 'theme_settings' , array(
				'title'      => __('Theme settings','twentytwentyone'),
				'priority'   => 30,
			) );


			$wp_customize->add_setting(
				'display_excerpt_or_fullpost',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => 'excerpt',
				)
			);

			$wp_customize->add_control(
				'display_excerpt_or_fullpost',
				array(
					'type'    => 'radio',
					'section' => 'theme_settings',
					'label'   => __( 'On the Posts page, post show:', 'twentytwentyone' ),
					'choices' => array(
						'excerpt' => 'Excerpt',
						'full' 	  => 'Full text',
					),
				)
			);

			// Background color.
			// Include the custom control class.
			include_once get_theme_file_path( 'classes/class-twenty-twenty-one-customize-color-control.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

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

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked = null ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'Twenty_Twenty_One_Customize', 'register' ) );

}

if ( ! function_exists( 'twenty_twenty_one_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	function twenty_twenty_one_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'twenty_twenty_one_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	function twenty_twenty_one_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}
