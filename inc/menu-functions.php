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
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function twenty_twenty_one_add_dropdown_icons( $output, $item, $depth, $args ) {

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
		// Add SVG icon to parent items.
		$output .= twenty_twenty_one_get_icon_svg( 'plus', 18 );
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'twenty_twenty_one_add_dropdown_icons', 10, 4 );

/**
 * WCAG 2.0 Attributes for Dropdown Menus.
 *
 * Adjustments to menu attributes to support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @see https://www.w3.org/WAI/tutorials/menus/flyout/
 *
 * @param array    $atts  The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 * @param WP_Post  $item  The current menu item.
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 *
 * @return array
 */
function twenty_twenty_one_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	// Add [aria-haspopup] and [aria-expanded] to menu items that have children.
	$item_has_children = in_array( 'menu-item-has-children', $item->classes, true );
	if ( $item_has_children ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'twenty_twenty_one_nav_menu_link_attributes', 10, 4 );
