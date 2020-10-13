<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

// Print the 1st 2 paragraphs, or fallback to the excerpt.
if ( ! twenty_twenty_one_print_first_instance_of_block( 'core/paragraph', get_the_content(), 2 ) ) {
	the_excerpt();
}
