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

// Print the 1st video we can find.
twenty_twenty_one_print_first_instance_of_block( 'core/embed/video', get_the_content() );

// Add the excerpt.
the_excerpt();
