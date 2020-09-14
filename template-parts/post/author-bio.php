<?php
/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>

<div class="author-bio">
	<?php
	echo get_avatar( get_the_author_meta( 'ID' ), '90' );
	_e( 'By', 'twentytwentyone' );
	?>
	<h2 class="author-title">
		<span class="author-heading">
			<?php
			printf(
				/* post author */
				esc_html( get_the_author() )
			);
			?>
		</span>
	</h2>
	<p class="author-description">
		<?php the_author_meta( 'description' ); ?></br>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
		<?php
		printf(
			/* translators: 1: Author name */
			__( "View all of %s's posts", 'twentytwentyone' ),
			get_the_author()
		);
		?>
		</a>
	</p><!-- .author-description -->
</div><!-- .author-bio -->

