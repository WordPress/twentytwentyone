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

	function __construct() {

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
	 * Find the resulting colour by blending 2 colours
	 * and setting an opacity level for the foreground colour.
	 *
	 * @author J de Silva
	 * @link http://www.gidnetwork.com/b-135.html
	 * @param string $foreground Hexadecimal colour value of the foreground colour.
	 * @param integer $opacity Opacity percentage (of foreground colour). A number between 0 and 100.
	 * @param string $background Optional. Hexadecimal colour value of the background colour. Default is: <code>FFFFFF</code> aka white.
	 * @return string Hexadecimal colour value. <code>false</code> on errors.
	 */
	function color_blend_by_opacity( $foreground, $opacity, $background = null ) {
		static $colors_rgb = array(); // stores colour values already passed through the hexdec() functions below.

		if ( ! is_null( $foreground ) ) {
			$foreground = '000000'; // default primary.
		} else {
			$foreground = preg_replace( '/[^0-9a-f]/i', '', $foreground ); //str_replace( '#', '', $foreground );
		}

		if ( ! is_null( $background ) ) {
			$background = 'FFFFFF'; // default background.
		} else {
			$background = preg_replace( '/[^0-9a-f]/i', '', $background );
		}

		$pattern = '~^[a-f0-9]{6,6}$~i'; // accept only valid hexadecimal colour values.

		if ( !@preg_match($pattern, $foreground) or !@preg_match($pattern, $background) ) {
			echo $foreground;
			trigger_error( "Invalid hexadecimal color value(s) found", E_USER_WARNING );
			return false;
		}

		$opacity = intval( $opacity ); // validate opacity data/number.

		if ( $opacity > 100  || $opacity < 0 ) {
			trigger_error( "Opacity percentage error, valid numbers are between 0 - 100", E_USER_WARNING );
			return false;
		}

		if ( $opacity == 100 )  // $transparency == 0
			return strtoupper( $foreground );
		if ( $opacity == 0 )    // $transparency == 100
			return strtoupper( $background );

		// calculate $transparency value.
		$transparency = 100-$opacity;

		if ( !isset($colors_rgb[$foreground]) ) { // do this only ONCE per script, for each unique colour.
			$f = array(
				'r'=>hexdec($foreground[0].$foreground[1]),
				'g'=>hexdec($foreground[2].$foreground[3]),
				'b'=>hexdec($foreground[4].$foreground[5])
			);
			$colors_rgb[$foreground] = $f;
		} else { // if this function is used 100 times in a script, this block is run 99 times.  Efficient.
			$f = $colors_rgb[$foreground];
		}

		if ( !isset($colors_rgb[$background]) ) { // do this only ONCE per script, for each unique colour.
			$b = array(
				'r'=>hexdec($background[0].$background[1]),
				'g'=>hexdec($background[2].$background[3]),
				'b'=>hexdec($background[4].$background[5])
			);
			$colors_rgb[$background] = $b;
		} else { // if this FUNCTION is used 100 times in a SCRIPT, this block will run 99 times.  Efficient.
			$b = $colors_rgb[$background];
		}

		$add = array(
			'r'=>( $b['r']-$f['r'] ) / 100,
			'g'=>( $b['g']-$f['g'] ) / 100,
			'b'=>( $b['b']-$f['b'] ) / 100
		);

		$f['r'] += intval( $add['r'] * $transparency );
		$f['g'] += intval( $add['g'] * $transparency );
		$f['b'] += intval( $add['b'] * $transparency );

		return sprintf( '#%02X%02X%02X', $f['r'], $f['g'], $f['b'] );
	}

	/**
	 * Determine the luminance of the given color and then return #FFFFFF or #222222 so that our text is always readable.
	 * 
	 * @param $background color string|array
	 *
	 * @return string (hex color)
	 */
	function custom_get_readable_color( $background_color ) {
		return ( 127 < $this->get_relative_luminance_from_hex( $background_color ) ) ? '#222222' : '#FFFFFF';
	}

	/**
	 * Generate color variables.
	 */
	/**
	 * Adjust the color value of the CSS variables depending on the background color theme mod.
	 * Both text and link colors needs to be updated.
	 * The code below needs to be updated, because the colors are no longer theme mods.
	 */
	function generate_custom_color_variables( $context = null ) {

		if ( $context === 'editor' ) {
			$theme_css = ':root .editor-styles-wrapper {';
		} else {
			$theme_css = ':root {';
		}

		if ( get_theme_mod( 'background_color', 'D1E4DD' ) !== 'D1E4DD' ) {

			// Update the global background color value for the editor:
			$theme_css .= "--global--color-background: #" . get_theme_mod( 'background_color', 'D1E4DD' ) . ";";

			$theme_css .= "--global--color-primary: " . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ";";
			//$theme_css .= "--global--color-primary-hover: " . custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ";";

			$theme_css .= "--global--color-secondary: " . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ";";
			//$theme_css .= "--global--color-secondary-hover: " . $adjusted_color . ";";

			$theme_css .= "--global--color-foreground: " . $this->custom_get_readable_color( get_theme_mod( 'background_color', 'D1E4DD' ) ) . ";";
			//$theme_css .= "--global--color-foreground-light: " . $adjusted_color . ";";

		}

		$theme_css .= "}";

		// Text selection colors.
		$selection_background = $this->color_blend_by_opacity( '#000000', 5, get_theme_mod( 'background_color', 'D1E4DD' ) ) . ";";
		$theme_css .= "::selection { background-color: " . $selection_background . "}";
		$theme_css .= "::-moz-selection { background-color: ". $selection_background . "}";

		return $theme_css;
	}

	/**
	 * Customizer & frontend custom color variables.
	 */
	function custom_color_variables() {
		if ( 'D1E4DD' !== get_theme_mod( 'background_color', 'D1E4DD' ) ) {
			wp_add_inline_style( 'twenty-twenty-one-style', $this->generate_custom_color_variables() );
		}
	}

	/**
	 * Editor custom color variables.
	 */
	function editor_custom_color_variables() {
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

		// Remove the "#" symbol from the beginning of the color.
		$hex = ltrim( $hex, '#' );

		// Make sure we have 6 digits for the below calculations.
		if ( 3 === strlen( $hex ) ) {
			$hex = substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 2, 1 ) . substr( $hex, 2, 1 );
		}

		// Get red, green, blue.
		$red   = hexdec( substr( $hex, 0, 2 ) );
		$green = hexdec( substr( $hex, 2, 2 ) );
		$blue  = hexdec( substr( $hex, 4, 2 ) );

		// Calculate the luminance.
		$lum = ( 0.2126 * $red ) + ( 0.7152 * $green ) + ( 0.0722 * $blue );
		return round( $lum );
	}
}

new Twenty_Twenty_One_Custom_Colors;
