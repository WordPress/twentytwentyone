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
 * Filters the CSS class(es) applied to a menu list element.
 *
 * @param array $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @return array
 */
add_filter(
	'nav_menu_submenu_css_class',
	function( $classes ) {
		return array( 'wp-block-navigation__container' );
	}
);

/**
 * Filters the CSS classes applied to a menu item's list item element.
 *
 * @param array $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @return array
 */
add_filter(
	'nav_menu_css_class',
	function( $classes ) {
		$item_classes = array( 'wp-block-navigation-link' );
		if ( in_array( 'current-menu-item', $classes, true ) ) {
			$item_classes[] = 'current-menu-item';
		}
		if ( in_array( 'menu-item-has-children', $classes, true ) ) {
			$item_classes[] = 'has-child';
		}
		return $item_classes;
	}
);

/**
 * Filters the HTML attributes applied to a menu item's anchor element.
 *
 * @param array $atts The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @return array
 */
add_filter(
	'nav_menu_link_attributes',
	function( $atts ) {
		$atts['class'] = 'wp-block-navigation-link__content';
		return $atts;
	}
);

/**
 * Filters a menu item's title.
 *
 * @param string $title The menu item's title.
 * @return string
 */
add_filter(
	'nav_menu_item_title',
	function( $title ) {
		return '<span class="wp-block-navigation-link__label">' . $title . '</span>';
	}
);


/**
 * Filters a menu item's starting output.
 *
 * Append the dropdown arrow to links with submenus.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @return string
 */
add_filter(
	'walker_nav_menu_start_el',
	function( $item_output, $item ) {
		$has_children = in_array( 'menu-item-has-children', $item->classes, true );
		if ( $has_children ) {
			$item_output = str_replace(
				'</a>',
				'</a><span class="wp-block-navigation-link__submenu-icon">' . twenty_twenty_one_get_icon_svg( 'plus' ) . '</span>',
				$item_output
			);
		}
		return $item_output;
	},
	10,
	2
);



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
