<?php
/**
 * Custom CSS
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Generate CSS.
 *
 * @param string $selector The CSS selector.
 * @param string $style The CSS style.
 * @param string $value The CSS value.
 * @param string $prefix The CSS prefix.
 * @param string $suffix The CSS suffix.
 * @param bool   $echo Echo the styles.
 *
 * @return string
 */
function twenty_twenty_one_generate_css( $selector, $style, $value, $prefix = '', $suffix = '', $echo = true ) {
	$return = '';

	/*
	* Bail early if we have no $selector elements or properties and $value.
	*/
	if ( ! $value || ! $selector ) {
		return '';
	}

	$return = sprintf( '%s { %s: %s; }', $selector, $style, $prefix . $value . $suffix );

	if ( $echo ) {
		echo $return; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;)
	}
	return $return;
}
