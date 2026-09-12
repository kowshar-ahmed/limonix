<?php
/**
 * Asset enqueueing.
 *
 * No CSS/JS files ship with the plugin yet, so these functions are
 * registered but intentionally do nothing beyond being ready to use —
 * this keeps the hook wiring in place for when assets are added.
 *
 * @package Limonix_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'limonix_enqueue_public_assets' ) ) {
	/**
	 * Enqueue front-end styles and scripts.
	 *
	 * Reserved for future use, e.g.:
	 *
	 * wp_enqueue_style( 'limonix-core', LIMONIX_CORE_URL . 'assets/css/limonix-core.css', array(), limonix_core_version() );
	 * wp_enqueue_script( 'limonix-core', LIMONIX_CORE_URL . 'assets/js/limonix-core.js', array(), limonix_core_version(), true );
	 */
	function limonix_enqueue_public_assets() {
		// Intentionally empty for now.
	}
}
add_action( 'wp_enqueue_scripts', 'limonix_enqueue_public_assets' );

if ( ! function_exists( 'limonix_enqueue_admin_assets' ) ) {
	/**
	 * Enqueue admin-area styles and scripts.
	 *
	 * @param string $hook_suffix The current admin page hook suffix.
	 */
	function limonix_enqueue_admin_assets( $hook_suffix ) {
		// Intentionally empty for now.
	}
}
add_action( 'admin_enqueue_scripts', 'limonix_enqueue_admin_assets' );
