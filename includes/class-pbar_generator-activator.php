<?php

/**
 * Fired during plugin activation
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.0.7
 * @package    pbar_generator
 * @subpackage pbar_generator/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class pbar_generator_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.7
	 */
	public static function activate() {
		flush_rewrite_rules();
		if(isset($_POST['action']) && current_user_can('manage_options')) {

		  update_option( 'pbar_generator_settings' , sanitize_text_field($_POST['pbar_generator_settings']));

		}



		

	}


}
