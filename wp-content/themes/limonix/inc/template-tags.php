<?php
/**
 * Custom template tags for this theme.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'limonix_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function limonix_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		echo '<span class="posted-on">' . wp_kses_post( $time_string ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'limonix_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function limonix_posted_by() {
		echo '<span class="byline"> ' . esc_html__( 'by', 'limonix' ) . ' <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
	}
endif;

if ( ! function_exists( 'limonix_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for categories, tags, and comments.
	 */
	function limonix_entry_footer() {

		// Categories.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'limonix' ) );
			if ( $categories_list ) {
				/* translators: %s: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'limonix' ) . '</span>', wp_kses_post( $categories_list ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			// Tags.
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'limonix' ) );
			if ( $tags_list && ! is_wp_error( $tags_list ) ) {
				/* translators: %s: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'limonix' ) . '</span>', wp_kses_post( $tags_list ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		// Comments link.
		if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				esc_html__( 'Leave a comment', 'limonix' ),
				esc_html__( '1 Comment', 'limonix' ),
				esc_html__( '% Comments', 'limonix' )
			);
			echo '</span>';
		}

		// Edit link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'limonix' ),
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
	}
endif;

if ( ! function_exists( 'limonix_post_thumbnail' ) ) :
	/**
	 * Displays a post thumbnail, if available, and skips it on the singular
	 * template if a password is required or the page is the front page.
	 */
	function limonix_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'large' ); ?>
			</div><!-- .post-thumbnail -->
			<?php
		else :
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
			</a>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'limonix_the_archive_title' ) ) :
	/**
	 * Filters the archive title for consistent output across archive templates.
	 *
	 * @param string $title Archive title.
	 * @return string
	 */
	function limonix_the_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}

		return $title;
	}
endif;
add_filter( 'get_the_archive_title', 'limonix_the_archive_title' );
