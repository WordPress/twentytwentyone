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

?>

<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( $blog_info && get_theme_mod( 'display_title_and_tagline', true ) === true ) : ?>
		<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><?php $blog_info; ?></h1>
		<?php elseif ( is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php $blog_info; ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php $blog_info; ?></a></p>
		<?php endif; ?>
	<?php elseif ( $blog_info && is_home() ) : ?>
		<h1 class="screen-reader-text"><?php $blog_info; ?></h1>
	<?php endif; ?>

	<?php if ( $description && get_theme_mod( 'display_title_and_tagline', true ) === true ) : ?>
		<p class="site-description">
			<?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</p>
	<?php endif; ?>
</div><!-- .site-branding -->
