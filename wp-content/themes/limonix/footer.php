<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- .footer-widgets -->
		<?php endif; ?>

		<nav id="footer-navigation" class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'limonix' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav><!-- #footer-navigation -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'limonix' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'limonix' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			printf(
				/* translators: 1: Theme name, 2: Theme author. */
				esc_html__( 'Theme: %1$s by %2$s.', 'limonix' ),
				'Limonix',
				esc_html__( 'Kowshar Ahmed', 'limonix' )
			);
			?>
			<span class="sep"> | </span>
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
