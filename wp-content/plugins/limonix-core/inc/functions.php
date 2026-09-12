<?php
/**
 * General helper functions.
 *
 * Small, standalone utility functions available anywhere the plugin is
 * active. Kept theme-agnostic — nothing here assumes any specific theme
 * is active.
 *
 * @package Limonix_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'limonix_core_version' ) ) {
	/**
	 * Get the currently running Limonix Core plugin version.
	 *
	 * @return string
	 */
	function limonix_core_version() {
		return defined( 'LIMONIX_CORE_VERSION' ) ? LIMONIX_CORE_VERSION : '';
	}
}

if ( ! function_exists( 'limonix_is_elementor_active' ) ) {
	/**
	 * Check whether Elementor is active and loaded.
	 *
	 * Used to gate any Elementor-specific code so this plugin never
	 * errors out on sites that don't have Elementor installed.
	 *
	 * @return bool
	 */
	function limonix_is_elementor_active() {
		return did_action( 'elementor/loaded' ) > 0;
	}
}

if ( ! function_exists( 'limonix_asset_url' ) ) {
	/**
	 * Build a full URL to a file inside this plugin.
	 *
	 * @param string $path Relative path from the plugin root, e.g. 'inc/functions.php'.
	 * @return string Escaped, fully-qualified URL.
	 */
	function limonix_asset_url( $path ) {
		return esc_url( trailingslashit( LIMONIX_CORE_URL ) . ltrim( $path, '/' ) );
	}
}
