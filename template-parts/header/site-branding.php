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

	if ( ! empty( $blog_info ) && get_theme_mod( 'display_title_and_tagline', true ) === true ) {
		if ( is_home() ) {
			if ( is_paged() ) {
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			} else {
				?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php
			}
		} elseif ( is_front_page() ) {
			?>
			<p class="site-title"><?php bloginfo( 'name' ); ?></p>
			<?php
		} else {
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		}
	} elseif ( ! empty( $blog_info ) && is_home() ) {
		?>
		<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
		<?php
	}

	$description = get_bloginfo( 'description', 'display' );
	if ( $description && get_theme_mod( 'display_title_and_tagline', true ) === true ) {
		printf( '<p class="site-description">%s</p>', $description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	?>
</div><!-- .site-branding -->
