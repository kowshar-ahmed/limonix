<?php
/**
 * Limonix Core
 *
 * @package           Limonix_Core
 * @author            Kowshar Ahmed
 *
 * @wordpress-plugin
 * Plugin Name:       Limonix Core
 * Plugin URI:        https://example.com/limonix-core
 * Description:       Core companion plugin for the Limonix theme. Provides the foundational structure that future core functionality and Elementor widgets will be built on top of.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Kowshar Ahmed
 * Author URI:        https://example.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       limonix-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin version. Bump this on every release; also used to cache-bust
 * enqueued assets.
 */
if ( ! defined( 'LIMONIX_CORE_VERSION' ) ) {
	define( 'LIMONIX_CORE_VERSION', '1.0.0' );
}

/**
 * Absolute path/URL constants, used throughout the plugin instead of
 * repeatedly calling plugin_dir_path() / plugin_dir_url().
 */
if ( ! defined( 'LIMONIX_CORE_PATH' ) ) {
	define( 'LIMONIX_CORE_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'LIMONIX_CORE_URL' ) ) {
	define( 'LIMONIX_CORE_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'LIMONIX_CORE_BASENAME' ) ) {
	define( 'LIMONIX_CORE_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! class_exists( 'Limonix_Core' ) ) :

	/**
	 * Main plugin bootstrap class.
	 *
	 * Kept as a single, simple singleton for now. Its only job at this
	 * stage is to load the plugin text domain and pull in the inc/ and
	 * widgets/ directories in a scalable way.
	 */
	final class Limonix_Core {

		/**
		 * Single instance of this class.
		 *
		 * @var Limonix_Core|null
		 */
		private static $instance = null;

		/**
		 * Get (or create) the single instance of this class.
		 *
		 * @return Limonix_Core
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor. Kept private — use Limonix_Core::instance().
		 */
		private function __construct() {
			$this->includes();
			$this->init_hooks();
		}

		/**
		 * Load the plugin's include files.
		 *
		 * Every file living directly inside inc/ is loaded automatically,
		 * so adding new core functionality later never requires touching
		 * this main plugin file.
		 */
		private function includes() {
			foreach ( glob( LIMONIX_CORE_PATH . 'inc/*.php' ) as $file ) {
				require_once $file;
			}
		}

		/**
		 * Register core WordPress hooks.
		 */
		private function init_hooks() {
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
			add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		}

		/**
		 * Load the plugin text domain for translation.
		 */
		public function load_textdomain() {
			load_plugin_textdomain(
				'limonix-core',
				false,
				dirname( LIMONIX_CORE_BASENAME ) . '/languages/'
			);
		}

		/**
		 * Register Elementor widgets, if Elementor is active.
		 *
		 * No widgets exist yet — this only prepares the loading mechanism.
		 * Once widget classes are added to widgets/, each file should
		 * define a class extending \Elementor\Widget_Base and be required
		 * + registered here.
		 *
		 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager instance.
		 */
		public function register_widgets( $widgets_manager ) {
			if ( ! did_action( 'elementor/loaded' ) ) {
				return;
			}

			/*
			 * Reserved for future use, e.g.:
			 *
			 * require_once LIMONIX_CORE_PATH . 'widgets/class-limonix-example-widget.php';
			 * $widgets_manager->register( new \Limonix_Example_Widget() );
			 */
		}
	}

endif;

/**
 * Begins execution of the plugin.
 *
 * Since everything is registered via hooks, kicking things off here does
 * not affect the page life cycle.
 *
 * @return Limonix_Core
 */
function limonix_core() {
	return Limonix_Core::instance();
}

limonix_core();
