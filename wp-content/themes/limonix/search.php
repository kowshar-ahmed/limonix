<?php
/**
 * The template for displaying search results pages.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'limonix' ), '<span>' . get_search_query() . '</span>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
