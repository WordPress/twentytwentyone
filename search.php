<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

if ( have_posts() ) {
	?>
	<header class="page-header default-max-width">
		<?php
		printf(
			/* translators: 1: search result title. 2: search term. */
			'<h1 class="page-title">%1$s <span class="page-description search-term">%2$s</span></h1>',
			__( 'Search results for:', 'twentytwentyone' ),
			get_search_query()
		);
		?>
	</header><!-- .page-header -->

	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content/content-excerpt' );
	endwhile; // End the loop.

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
