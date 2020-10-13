<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

$blog_info   = get_bloginfo( 'name' );
$description = get_bloginfo( 'description', 'display' );
$header_class = ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? 'site-title' : 'screen-reader-text';

?>

<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( $blog_info ) : ?>
		<?php if ( is_front_page() && ! is_paged() ) : ?>
			<h1 class="<?php echo $header_class; ?>"><?php echo esc_html( $blog_info ); ?></h1>
		<?php elseif ( is_front_page() || is_home() ) : ?>
			<h1 class="<?php echo $header_class; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $blog_info ); ?></a></h1>
		<?php else : ?>
			<p class="<?php echo $header_class; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $blog_info ); ?></a></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
		<p class="site-description">
			<?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</p>
	<?php endif; ?>
</div><!-- .site-branding -->
