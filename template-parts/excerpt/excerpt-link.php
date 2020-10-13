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

// Print the 1st instance of a paragraph block. If none is found, print the content.
if ( ! has_block( 'core/paragraph', get_the_content() ) ) {
	the_content();
} else {
	twenty_twenty_one_print_first_instance_of_block( 'core/paragraph', get_the_content() );
}
