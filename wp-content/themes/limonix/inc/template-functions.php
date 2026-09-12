<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function limonix_body_classes( $classes ) {

	// Adds a class if there is a sidebar to display.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-full-width.php' ) ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'limonix_body_classes' );

/**
 * Adds a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function limonix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'limonix_pingback_header' );

/**
 * Adds a comment-reply script only when necessary — kept here for reference
 * even though wp_enqueue_scripts already conditionally loads it.
 */
