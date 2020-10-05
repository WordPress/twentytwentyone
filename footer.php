<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
			</main><!-- #main -->
		</section><!-- #primary -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
					<?php
					else :
						$blog_info = get_bloginfo( 'name' );
						if ( ! empty( $blog_info ) ) :
							if ( is_front_page() && ! is_paged() ) :
								?>
								<?php bloginfo( 'name' ); ?>
							<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								<?php
								endif;
							endif;
						endif;
					?>
			</div><!-- .site-name -->
			<div class="copyright">
				<?php
				/* translators: 1: Copyright date format, see https://www.php.net/manual/datetime.format.php, 2: Site name */
				printf(
					/* Translators: %1$s: Copyright date. %2$s: Site name. */
					esc_html__( '&copy; %1$s %2$s', 'twentytwentyone' ),
					esc_html( date_i18n( _x( 'Y', 'copyright date format', 'twentytwentyone' ) ) ),
					esc_html( get_bloginfo( 'name' ) . '.' )
				);

				/**
				 * WIP: Remove or add spacing?
				if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link();
				}
				 */
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ); ?>"  class="imprint">
				<?php /* translators: %s: WordPress. */ printf( esc_html__( 'Proudly powered by %s.', 'twentytwentyone' ), 'WordPress' ); ?>
				</a>
			</div><!-- .copyright -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
