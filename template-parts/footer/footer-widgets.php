<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .widget-area -->

<?php endif; ?>
