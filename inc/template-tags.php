<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

if ( ! function_exists( 'twenty_twenty_one_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			/* translators: 2: author link. 3: author name*/
			'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html__( 'Published', 'twentytwentyone' ),
			esc_url( get_permalink() ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);
	}
}

if ( ! function_exists( 'twenty_twenty_one_posted_by' ) ) {
	/**
	 * Prints HTML with meta information about theme author.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_posted_by() {
		printf(
			/* translators: 1: post author, only visible to screen readers. 2: author link. 3: author name*/
			'<span class="byline"><span class="screen-reader-text">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
			esc_html__( 'Posted by', 'twentytwentyone' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

if ( ! function_exists( 'twenty_twenty_one_comment_count' ) ) {
	/**
	 * Prints HTML with the comment count for the current post.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentytwentyone' ), get_the_title() ) );
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'twenty_twenty_one_entry_meta_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_entry_meta_footer() {

		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Hide meta information on pages.
		if ( ! is_single() ) {
			// Posted on.
			twenty_twenty_one_posted_on();

			// Edit post link.
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Edit<span class="screen-reader-text"> %s</span>', 'twentytwentyone' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span><br>'
			);

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'twentytwentyone' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: posted in label, 2: list of categories. */
					'<span class="cat-links">%1$s %2$s</span>',
					esc_html__( 'Categorized as', 'twentytwentyone' ),
					$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
				);
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'twentytwentyone' ) );
			if ( $tags_list ) {
				printf(
					/* translators: %1$s: posted in label, %2$s: list of tags. */
					'<span class="tags-links">%1$s %2$s</span>',
					esc_html__( 'Tagged', 'twentytwentyone' ),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
				);
			}
		} elseif ( is_single() ) {
			// Posted on.
			twenty_twenty_one_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'twentytwentyone' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: posted in label, 2: list of categories. */
					'<span class="cat-links">%1$s %2$s</span>',
					esc_html__( 'Categorized as', 'twentytwentyone' ),
					$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
				);
			}

			// Edit post link.
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Edit<span class="screen-reader-text"> %s</span>', 'twentytwentyone' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'twentytwentyone' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: posted in label, 2: list of tags. */
					'<span class="tags-links">%1$s %2$s</span>',
					esc_html__( 'Tagged', 'twentytwentyone' ),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
				);
			}
		}
	}
}

if ( ! function_exists( 'twenty_twenty_one_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_post_thumbnail() {
		if ( ! twenty_twenty_one_can_show_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
			</figure>

		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'twenty_twenty_one_get_user_avatar_markup' ) ) {
	/**
	 * Returns the HTML markup to generate a user avatar.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $id_or_email The user-ID or email.
	 *
	 * @return string
	 */
	function twenty_twenty_one_get_user_avatar_markup( $id_or_email = null ) {
		$id_or_email = isset( $id_or_email ) ? $id_or_email : get_current_user_id();
		return sprintf(
			'<div class="comment-user-avatar comment-author vcard">%s</div>',
			get_avatar(
				$id_or_email,
				twenty_twenty_one_get_avatar_size()
			)
		);
	}
}

if ( ! function_exists( 'twenty_twenty_one_the_posts_navigation' ) ) {
	/**
	 * Print the next and previous posts navigation.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					/* Translators: Left arrow */
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'arrow_left' ),
					esc_html__( 'Older posts', 'twentytwentyone' )
				),
				'next_text' => sprintf(
					/* Translators: Right arrow */
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer posts', 'twentytwentyone' ),
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'arrow_right' )
				),
			)
		);
	}
}
