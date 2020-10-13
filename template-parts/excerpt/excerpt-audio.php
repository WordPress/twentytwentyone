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

// Print the 1st instance of an audio block.
// If there was no audioblock, print the 1st audio-embed block.
if (
	! twenty_twenty_one_print_first_instance_of_block( 'core/embed', get_the_content() ) &&
	! twenty_twenty_one_print_first_instance_of_block( 'core/audio', get_the_content() )
) {

	// Fallback to the content.
	the_content();
} else {

	// Add the excerpt.
	the_excerpt();
}
