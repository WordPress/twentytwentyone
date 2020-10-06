<?php
/**
 * SVG Icons class
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * This class is in charge of displaying SVG icons across the site.
 *
 * Place each <svg> source on its own array key, without adding either
 * the `width` or `height` attributes, since these are added dynamically,
 * before rendering the SVG code.
 *
 * All icons are assumed to have equal width and height, hence the option
 * to only specify a `$size` parameter in the svg methods.
 *
 * @since 1.0.0
 */
class Twenty_Twenty_One_SVG_Icons {

	/**
	 * Gets the SVG code for a given icon.
	 *
	 * @static
	 * @access public
	 *
	 * @param string $group "ui".
	 * @param string $icon  The icon.
	 * @param int    $size  The icon-size in pixels.
	 *
	 * @return string
	 */
	public static function get_svg( $group, $icon, $size ) {
		if ( 'ui' !== $group ) {
			return '';
		}
		$svg = '';
		$arr = self::$ui_icons;
		if ( array_key_exists( $icon, $arr ) ) {
			$repl = sprintf( '<svg class="svg-icon" width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ', $size, $size );

			$svg = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
			// @phpstan-ignore-next-line.
			$svg = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
			// @phpstan-ignore-next-line.
			$svg = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.
		}
		// @phpstan-ignore-next-line.
		return $svg;
	}

	/**
	 * User Interface icons – svg sources.
	 *
	 * @var array
	 */
	public static $ui_icons = array(
		'arrow_right' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 11V9h12l-4-4 1-2 7 7-7 7-1-2 4-4H2z" fill="currentColor"/></svg>',
		'arrow_left'  => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M20 13v-2H8l4-4-1-2-7 7 7 7 1-2-4-4z" fill="currentColor"/></svg>',
		'close'       => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 10.9394L5.53033 4.46973L4.46967 5.53039L10.9393 12.0001L4.46967 18.4697L5.53033 19.5304L12 13.0607L18.4697 19.5304L19.5303 18.4697L13.0607 12.0001L19.5303 5.53039L18.4697 4.46973L12 10.9394Z" fill="currentColor"/></svg>',
		'menu'        => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 6H19.5V7.5H4.5V6ZM4.5 12H19.5V13.5H4.5V12ZM19.5 18H4.5V19.5H19.5V18Z" fill="currentColor"/></svg>',
	);
}
