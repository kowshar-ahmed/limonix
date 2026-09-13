<?php

/**
 * Plugin Name: Mindu Core
 * Description: Mindu core plugin for mindu theme.
 * Version:     1.0.0
 * Author:      Kowshar Ahmed
 * Author URI:  https://kowsharahmed.com/
 * Text Domain: mindu-core
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

require_once(__DIR__ . '/inc/traits/link.php');
require_once(__DIR__ . '/inc/traits/common-style.php');
require_once(__DIR__ . '/inc/traits/icon-style.php');



//plugin helper functions
require_once(__DIR__ . '/inc/plugin-helper.php');

function register_mindu_heading_widget($widgets_manager)
{

	// require_once(__DIR__ . '/widgets/header-menu.php');


	// $widgets_manager->register(new \Mindu_Header_Menu());

}
add_action('elementor/widgets/register', 'register_mindu_heading_widget');



// Mindu widget category register

function add_widget_categories($elements_manager)
{

	$elements_manager->add_category(
		'mindu-category',
		[
			'title' => esc_html__('Mindu', 'textdomain'),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action('elementor/elements/categories_registered', 'add_widget_categories');
