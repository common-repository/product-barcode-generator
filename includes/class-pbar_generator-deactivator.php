<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      2.0.7
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class pbar_generator_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.7
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
