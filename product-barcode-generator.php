<?php
/**
 * Plugin Name:       Product Barcode Generator
 * Plugin URI:        https://wordpress.org/plugins/product-barcode-genrator/
 * Description:      This is an auto barcode generator plugin for WooCommerce products and orders.
 * Version:           2.0.7
 * Author:            Sharabindu
 * Author URI:        https://sharabindu.com/plugins/product-barcode-generator/
 * Text Domain:       product-barcode-generator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH'))
{
    die();
}

/**
 * Currently plugin version.
 * Start at version 2.0.7 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PBARGENERATOR_VERSION', '2.0.7');

/**
 * The core plugin path that is used to define internationalization
 */
define('PBARGENERATOR_PATH', plugin_dir_path(__FILE__));

/**
 * The core plugin url that is used to define internationalization
 */
define('PBARGENERATOR_URL', plugin_dir_url(__FILE__));

define('PBARGENERATOR_BASENAME', plugin_basename(__FILE__));



/**
 *Include plugin.php
 *Check Qr composer Pro Version is enable.
 * Then Deactive Pro version and activate Lite version
 */

include_once(ABSPATH.'wp-admin/includes/plugin.php');
if( is_plugin_active('product-barcode-generator-pro/product-barcode-generator.php') ){
     add_action('update_option_active_plugins', 'deactivate_pbarcodepro_version');
}
function deactivate_pbarcodepro_version(){
   deactivate_plugins('product-barcode-generator-pro/product-barcode-generator.php');
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pbar_generator-activator.php
 */
function pbar_generator_activate()
{

    require_once plugin_dir_path(__FILE__) . 'includes/class-pbar_generator-activator.php';
    pbar_generator_Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pbar_generator-deactivator.php
 */
function pbar_generator_deactivate()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-pbar_generator-deactivator.php';
    pbar_generator_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'pbar_generator_activate');
register_deactivation_hook(__FILE__, 'pbar_generator_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-pbar_generator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.7
 */
function pbar_generator_run()
{

    $plugin = new pbar_generator();
    $plugin->run();

}
pbar_generator_run();
