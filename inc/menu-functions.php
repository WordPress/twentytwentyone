<?php
/**
 * Functions and filters related to the menus.
 *
 * Makes the default WordPress navigation use an HTML structure similar
 * to the Navigation block.
 *
 * @link https://make.wordpress.org/themes/2020/07/06/printing-navigation-block-html-from-a-legacy-menu-in-themes/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * Add a button to top-level menu items that has sub-menus.
 * An icon is added using CSS depending on the value of aria-expanded.
 *
 * @since 1.0.0
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 *
 * @return string Nav menu item start element.
 */
function twenty_twenty_one_add_sub_menu_toggle( $output, $item, $depth, $args ) {
	error_log( print_r( $item, true ) );
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add toggle button.
		$output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="twentytwentyoneExpandSubMenu(this)"><span class="screen-reader-text">' . esc_html__( 'Toggle child menu', 'twentytwentyone' ) . '</span></button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'twenty_twenty_one_add_sub_menu_toggle', 10, 4 );

/**
 * Filters a menu item's title.
 *
 * @since 4.4.0
 *
 * @param string   $title The menu item's title.
 * @param WP_Post  $item  The current menu item.
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function twenty_twenty_one_add_menu_description( $title, $item, $args, $depth ) {
	return $title;
}
add_filter( 'nav_menu_item_title', 'twenty_twenty_one_add_menu_description', 10, 4 );

/**
 * Filters the arguments for a single nav menu item.
 *
 * @since 4.4.0
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function twenty_twenty_one_add_menu_description_args( $args, $item, $depth ) {
	if ( 0 === $depth && isset( $item->description ) && $item->description ) {
		$args->link_after = '<span class="menu-item-description">' . $item->description . '</span>';
	}
	return $args;
}
add_filter( 'nav_menu_item_args', 'twenty_twenty_one_add_menu_description_args', 10, 3 );
