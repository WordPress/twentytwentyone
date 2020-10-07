<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$twenty_twenty_one_comment_count = get_comments_number();
			if ( '1' === $twenty_twenty_one_comment_count ) {
				esc_html_e( '1 Reply', 'twentytwentyone' );
			} else {
				printf(
					/* Translators: %s: comment count number. */
					esc_html( _nx( '%s Reply', '%s Replies', $twenty_twenty_one_comment_count, 'comments title', 'twentytwentyone' ) ),
					esc_html( number_format_i18n( $twenty_twenty_one_comment_count ) )
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					/* Translators: Left arrow */
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'arrow_left' ),
					__( 'Older comments', 'twentytwentyone' )
				),
				'next_text' => sprintf(
					/* Translators: Right arrow */
					'<span class="nav-next-text">%s</span> %s',
					__( 'Newer comments', 'twentytwentyone' ),
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'arrow_right' )
				),
			)
		);

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'twentytwentyone' ); ?></p>
			<?php
		}
	} // Check for have_comments().

	comment_form(
		array(
			'logged_in_as' => null,
			'title_reply'  => esc_html__( 'Leave a reply', 'twentytwentyone' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>

</div><!-- #comments -->
