<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<div class="site-branding">

	<?php if ( has_custom_logo() ) { ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
		<?php
	}
	$blog_info = get_bloginfo( 'name' );
	if ( ! empty( $blog_info ) ) {
		if ( is_front_page() || ( is_front_page() && is_home() ) ) {
			if ( is_paged() ) {
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			} else {
				?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php
			}
		} else {
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		}
	}

	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) {
		printf( '<p class="site-description">%s</p>', $description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	?>
</div><!-- .site-branding -->
