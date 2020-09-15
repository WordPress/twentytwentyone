<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/site-branding' ); ?>

			<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<nav id="site-navigation" class="primary-navigation wp-block-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main', 'twentytwentyone' ); ?>">
					<div class="menu-button-container">
						<button id="primary-open-menu" class="button open" aria-haspopup="true" aria-controls="primary-navigation">
							<span class="dropdown-icon open"><?php esc_html_e( 'Menu', 'twentytwentyone' ); ?>
								<?php
								/* TODO: Select menu and close icons */
								echo twenty_twenty_one_get_icon_svg( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput
								?>
								<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img"
								focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M17 7V5H3v2h14zm0 4V9H3v2h14zm0 4v-2H3v2h14z" fill="currentColor"></path>
								</svg>
							</span>
							<span class="hide-visually expanded-text"><?php esc_html_e( 'expanded', 'twentytwentyone' ); ?></span>
						</button>
						<button id="primary-close-menu" class="button close" aria-haspopup="true" aria-controls="primary-navigation" aria-expanded="true">
							<span class="dropdown-icon close"><?php esc_html_e( 'Close', 'twentytwentyone' ); ?>
								<?php echo twenty_twenty_one_get_icon_svg( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
								<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img"
								focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z" fill="currentColor"></path>
								</svg>
							</span>
							<span class="hide-visually collapsed-text"><?php esc_html_e( 'collapsed', 'twentytwentyone' ); ?></span>
						</button>
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'menu-wrapper wp-block-navigation__container',
							'menu_id'        => 'primary-navigation',
							'container'      => 'false',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						)
					);
					?>
				</nav><!-- #site-navigation -->
				<?php } ?>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
