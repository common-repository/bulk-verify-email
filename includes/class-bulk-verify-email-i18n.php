<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       None
 * @since      1.0.1
 *
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.1
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 * @author     Xiao Sun <835468954@qq.com>
 */
class Bulk_Verify_Email_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bulk-verify-email',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
