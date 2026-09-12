<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">

		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'limonix' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching for what you were looking for?', 'limonix' ); ?></p>

			<?php get_search_form(); ?>
		</div><!-- .page-content -->

	</section><!-- .error-404 -->

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
