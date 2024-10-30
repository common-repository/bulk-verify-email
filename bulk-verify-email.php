<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              None
 * @since             1.0.0
 * @package           Bulk_Verify_Email
 *
 * @wordpress-plugin
 * Plugin Name:       Bulk-verify-email
 * Plugin URI:        https://emailverifier.online
 * Description:       Email Verifier Online is an online tool that helps customers to verify their email address validation.
 * Version:           1.0.4
 * Author:            Xiao Sun
 * Author URI:        None
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bulk-verify-email
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BULK_VERIFY_EMAIL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bulk-verify-email-activator.php
 */
function activate_bulk_verify_email() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulk-verify-email-activator.php';
	Bulk_Verify_Email_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bulk-verify-email-deactivator.php
 */
function deactivate_bulk_verify_email() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulk-verify-email-deactivator.php';
	Bulk_Verify_Email_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bulk_verify_email' );
register_deactivation_hook( __FILE__, 'deactivate_bulk_verify_email' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bulk-verify-email.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bulk_verify_email() {

	$plugin = new Bulk_Verify_Email();
	$plugin->run();

}
run_bulk_verify_email();
