<?php
/**
 * Custom Colors Class
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * This class is in charge of color customization via the Customizer.
 */
class Twenty_Twenty_One_Custom_Colors {

	/**
	 * Instantiate the object.
	 *
	 * @access public
	 */
	public function __construct() {

		/**
		 * Enqueue color variables for customizer & frontend.
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_color_variables' ) );

		/**
		 * Enqueue color variables for editor.
		 */
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_custom_color_variables' ) );
	}

	/**
	 * Find the resulting color by blending 2 colours
	 * and setting an opacity level for the 2nd color.
	 *
	 * @access public
	 *
	 * @param string $color1 Hex value of color1.
	 * @param string $color2 Hex value of color2.
	 * @param int    $mix    Percentage (of color2) that we want mixed in color1. Number between 0 and 100.
	 *
	 * @return string Hexadecimal color value.
	 */
	public function mix_colors( $color1, $color2, $mix ) {

		if ( 100 === $mix ) {
			return $color2;
		}
		if ( 0 === $mix ) {
			return $color1;
		}

		$c1 = $this->get_rgb_from_hex( $color1 );
		$c2 = $this->get_rgb_from_hex( $color2 );

		$add = array(
			'r' => ( $c1['r'] - $c2['r'] ) / 100,
			'g' => ( $c1['g'] - $c2['g'] ) / 100,
			'b' => ( $c1['b'] - $c2['b'] ) / 100,
		);

		$c2['r'] += intval( $add['r'] * ( 100 - $mix ) );
		$c2['g'] += intval( $add['g'] * ( 100 - $mix ) );
		$c2['b'] += intval( $add['b'] * ( 100 - $mix ) );

		return sprintf( '#%02X%02X%02X', $c2['r'], $c2['g'], $c2['b'] );
	}

	/**
	 * Determine the luminance of the given color and then return #FFFFFF or #222222 so that our text is always readable.
	 *
	 * @access public
	 *
	 * @param string $background_color The background color.
	 *
	 * @return string (hex color)
	 */
	public function custom_get_readable_color( $background_color ) {
		return ( 127 < $this->get_relative_luminance_from_hex( $background_color ) ) ? '#222222' : '#FFFFFF';
	}

	/**
	 * Generate color variables.
	 *
	 * Adjust the color value of the CSS variables depending on the background color theme mod.
	 * Both text and link colors needs to be updated.
	 * The code below needs to be updated, because the colors are no longer theme mods.
	 *
	 * @access public
	 *
	 * @param string|null $context Can be "editor" or null.
	 *
	 * @return string
	 */
	public function generate_custom_color_variables( $context = null ) {

		$theme_css = 'editor' === $context ? ':root .editor-styles-wrapper{' : ':root{';

		if ( get_theme_mod( 'background_color', 'D1E4DD' ) !== 'D1E4DD' ) {
			$theme_css .= '--global--color-background: #' . get_theme_mod( 'background_color', 'D1E4DD' ) . ';';
			$theme_css .= '--global--color-primary: ' . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ';';
			$theme_css .= '--global--color-secondary: ' . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ';';
			$theme_css .= '--global--color-foreground: ' . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ';';
		}

		$theme_css .= '}';

		// Text selection colors.
		$selection_background = $this->mix_colors( get_theme_mod( 'background_color', 'D1E4DD' ), '#000000', 5 ) . ';';
		$theme_css           .= '::selection { background-color: ' . $selection_background . '}';
		$theme_css           .= '::-moz-selection { background-color: ' . $selection_background . '}';

		return $theme_css;
	}

	/**
	 * Customizer & frontend custom color variables.
	 *
	 * @access public
	 */
	public function custom_color_variables() {
		if ( 'D1E4DD' !== get_theme_mod( 'background_color', 'D1E4DD' ) ) {
			wp_add_inline_style( 'twenty-twenty-one-style', $this->generate_custom_color_variables() );
		}
	}

	/**
	 * Editor custom color variables.
	 *
	 * @access public
	 */
	public function editor_custom_color_variables() {
		wp_enqueue_style( 'twenty-twenty-one-custom-color-overrides', get_template_directory_uri() . '/assets/css/custom-color-overrides.css', array(), wp_get_theme()->get( 'Version' ) );
		if ( 'D1E4DD' !== get_theme_mod( 'background_color', 'D1E4DD' ) ) {
			wp_add_inline_style( 'twenty-twenty-one-custom-color-overrides', $this->generate_custom_color_variables( 'editor' ) );
		}
	}

	/**
	 * Get luminance from a HEX color.
	 *
	 * @access public
	 *
	 * @since 1.0
	 *
	 * @param string $hex The HEX color.
	 *
	 * @return int Returns a number (0-255).
	 */
	public function get_relative_luminance_from_hex( $hex ) {

		// Get RGB from HEX.
		$rgb = $this->get_rgb_from_hex( $hex );

		// Calculate the luminance.
		$lum = ( 0.2126 * $rgb['r'] ) + ( 0.7152 * $rgb['g'] ) + ( 0.0722 * $rgb['b'] );

		// Return rounded lum.
		return round( $lum );
	}

	/**
	 * Get RBG values from a hex color.
	 *
	 * @access public
	 *
	 * @since 1.0
	 *
	 * @param string $hex The hex color.
	 *
	 * @return array Returns an array [r => int, g => int, b => int].
	 */
	public function get_rgb_from_hex( $hex ) {

		// Remove the "#" symbol from the beginning of the color.
		$hex = ltrim( $hex, '#' );

		// Make sure we have 6 digits for the below calculations.
		if ( 3 === strlen( $hex ) ) {
			$hex = substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 2, 1 ) . substr( $hex, 2, 1 );
		}

		return array(
			'r' => hexdec( substr( $hex, 0, 2 ) ),
			'g' => hexdec( substr( $hex, 2, 2 ) ),
			'b' => hexdec( substr( $hex, 4, 2 ) ),
		);
	}
}

new Twenty_Twenty_One_Custom_Colors();
