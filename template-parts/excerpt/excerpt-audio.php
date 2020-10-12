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

$has_audio_block = true;
// Print the 1st instance of an audio block.
if ( ! twenty_twenty_one_print_first_instance_of_block( 'core/audio', get_the_content() ) ) {

	// If there was no audioblock, print the 1st audio-embed block.
	if ( ! twenty_twenty_one_print_first_instance_of_block( 'core/embed', get_the_content() ) ) {

		// If there was no embed block either, then we couldn't find something to print.
		$has_audio_block = false;
	}
}

if ( $has_audio_block ) {

	// Add the excerpt.
	the_excerpt();
} else {

	// Fallback to the content.
	the_content();
}
