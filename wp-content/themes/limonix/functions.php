<?php
/**
 * Limonix functions and definitions.
 *
 * @package Limonix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme version, used for cache-busting enqueued assets.
 * Bump this on every release so browsers fetch fresh CSS/JS.
 */
if ( ! defined( 'LIMONIX_VERSION' ) ) {
	define( 'LIMONIX_VERSION', '1.0.0' );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800; // phpcs:ignore
}

/**
 * Theme setup.
 *
 * Registers support for various WordPress features.
 */
function limonix_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at wp-content/languages/themes/limonix-{locale}.mo
	 */
	load_theme_textdomain( 'limonix', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for post thumbnails (featured images) on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'limonix' ),
			'footer'  => esc_html__( 'Footer Menu', 'limonix' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'limonix_setup' );

/**
 * Register widget area(s).
 */
function limonix_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'limonix' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'limonix' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area', 'limonix' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'limonix' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'limonix_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function limonix_scripts() {

	// Main stylesheet (required — carries the theme header).
	wp_enqueue_style( 'limonix-style', get_stylesheet_uri(), array(), LIMONIX_VERSION );

	// Additional theme stylesheet from assets folder.
	wp_enqueue_style(
		'limonix-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'limonix-style' ),
		LIMONIX_VERSION
	);

	// Main theme script.
	wp_enqueue_script(
		'limonix-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		LIMONIX_VERSION,
		true
	);

	// Threaded comment reply script where needed.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'limonix_scripts' );

/**
 * Required files.
 *
 * Load helper files that keep functions.php focused and scalable.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
