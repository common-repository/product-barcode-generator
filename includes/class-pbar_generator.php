<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.7
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class pbar_generator {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.0.7
	 * @access   protected
	 * @var      pbar_generator_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.7
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.7
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.0.7
	 */
	public function __construct() {
		if ( defined( 'PBARGENERATOR_VERSION' ) ) {
			$this->version = PBARGENERATOR_VERSION;
		} else {
			$this->version = '2.0.7';
		}
		$this->plugin_name = 'pbar_generator';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();


	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - pbar_generator_Loader. Orchestrates the hooks of the plugin.
	 * - pbar_generator_i18n. Defines internationalization functionality.
	 * - pbar_generator_Admin. Defines all hooks for the admin area.
	 * - pbar_generator_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once PBARGENERATOR_PATH. 'includes/class-pbar_generator-loader.php';

		require_once PBARGENERATOR_PATH . 'admin/class_pbarcode_genartor_ordermail.php';

		require_once PBARGENERATOR_PATH . 'admin/class-pbr-pdfaabarcode.php';
		require_once PBARGENERATOR_PATH . 'includes/class-pbr-barcodenumber-generate.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once PBARGENERATOR_PATH . 'includes/class-pbar_generator-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once PBARGENERATOR_PATH . 'admin/class_pbarcode_genartor-admin.php';
		
		require_once PBARGENERATOR_PATH . 'includes/class-pbar-metaInfo.php';


		$this->loader = new pbar_generator_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the pbar_generator_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new pbar_generator_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function define_admin_hooks() {
	
		$plugin_admin = new pbar_generator_Admin( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_menu_define' );

		$this->loader->add_filter( 'plugin_action_links_' .plugin_basename( dirname( __DIR__ ).'/product-barcode-generator.php' ), $plugin_admin, 'plugin_settings_link');

		$this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'adminFooterTextQR', 1, 1);

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.0.7
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.7
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.0.7
	 * @return    pbar_generator_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.0.7
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
