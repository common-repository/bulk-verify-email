<?php

/**
 * Fired during plugin deactivation
 *
 * @link       None
 * @since      1.0.1
 *
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.1
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 * @author     Xiao Sun <835468954@qq.com>
 */
class Bulk_Verify_Email_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.1
	 */
	public static function deactivate() {
//        global $wpdb;
//        $table_name1 = $wpdb->prefix . 'bulk_email_category';
//        $table_name2 = $wpdb->prefix . 'bulk_task';
//        $table_name3 = $wpdb->prefix . 'bulk_timer';
//        $table_name4 = $wpdb->prefix . 'bulk_user_email_list';
//        $table_name5 = $wpdb->prefix . 'bulk_site_options';
//        $sql1 = "DROP TABLE IF EXISTS $table_name1;";
//        $sql2 = "DROP TABLE IF EXISTS $table_name2;";
//        $sql3 = "DROP TABLE IF EXISTS $table_name3;";
//        $sql4 = "DROP TABLE IF EXISTS $table_name4;";
//        $sql5 = "DROP TABLE IF EXISTS $table_name5;";
//        $wpdb->query($sql1);
//        $wpdb->query($sql2);
//        $wpdb->query($sql3);
//        $wpdb->query($sql4);
//        $wpdb->query($sql5);
//        delete_option("bulk_email_verify_db_version");
	}
}
//register_activation_hook( __FILE__,array( 'Bulk_Verify_Email_Deactivator', 'deactivate'));