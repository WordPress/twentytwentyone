<?php
/**
 * The blog.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

if ( have_posts() ) {

	?>
	<header class="page-header alignwide">
		<h2 class="page-title"><?php esc_html_e( 'Blog', 'twentytwentyone' ); ?></h2>
	</header><!-- .page-header -->
	<?php
	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/blog' );
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
