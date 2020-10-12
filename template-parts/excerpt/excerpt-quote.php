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

// If there is no quote or pullquote print the excerpt.
if (
	! twenty_twenty_one_print_first_instance_of_block( 'core/quote', get_the_content() ) &&
	! twenty_twenty_one_print_first_instance_of_block( 'core/pullquote', get_the_content() )
) {
	the_content();
}
