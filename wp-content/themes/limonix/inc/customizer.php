<?php
/**
 * Limonix Theme Customizer.
 *
 * Kept minimal for now — only core WordPress customizer sections
 * (site identity, menus, widgets) are used. Custom panels/sections
 * for theme options will be added later.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register basic customizer tweaks.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function limonix_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'limonix_customize_register' );

/**
 * Binds JS handlers to make the Theme Customizer preview reload changes asynchronously.
 */
function limonix_customize_preview_js() {
	wp_enqueue_script(
		'limonix-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		array( 'customize-preview' ),
		LIMONIX_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'limonix_customize_preview_js' );
