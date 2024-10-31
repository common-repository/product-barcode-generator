<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.0.7
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class pbar_generator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    2.0.7
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'product-barcode-generator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
