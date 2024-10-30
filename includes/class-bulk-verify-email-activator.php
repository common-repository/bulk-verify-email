<?php

/**
 * Fired during plugin activation
 *
 * @link       None
 * @since      1.0.1
 *
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.1
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/includes
 * @author     Xiao Sun <835468954@qq.com>
 */
class Bulk_Verify_Email_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.1
     */
    public static function activate()
    {
//        //Active
//        // create table
//        global $wpdb;
//        $table_name1 = $wpdb->prefix . 'bulk_email_category';
//        $table_name2 = $wpdb->prefix . 'bulk_task';
//        $table_name3 = $wpdb->prefix . 'bulk_timer';
//        $table_name4 = $wpdb->prefix . 'bulk_user_email_list';
//        $table_name5 = $wpdb->prefix . 'bulk_site_options';
//
//        $charset_collate = $wpdb->get_charset_collate();
//
//        $sql1 = "CREATE TABLE $table_name1 (
//          id int NOT NULL AUTO_INCREMENT,
//          name varchar(255) NOT NULL,
//          e_type varchar(255) NOT NULL,
//          catch_all_check int NOT NULL DEFAULT '1',
//          user_id varchar(255) NOT NULL DEFAULT 'all',
//          PRIMARY KEY (`id`)
//        ) $charset_collate;";
//
//        $sql2 = "CREATE TABLE $table_name2 (
//          id int NOT NULL AUTO_INCREMENT,
//          csv_name varchar(255) NOT NULL,
//          status varchar(100) NOT NULL DEFAULT 'running',
//          user_id varchar(255) NOT NULL,
//          PRIMARY KEY (`id`)
//        ) $charset_collate;";
//
//        $sql3 = "CREATE TABLE $table_name3 (
//          id int NOT NULL AUTO_INCREMENT,
//          user_id int NOT NULL,
//          e_range int NOT NULL,
//          time_range int DEFAULT NULL,
//          last_send int DEFAULT NULL,
//          time_count datetime DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) $charset_collate;";
//
//        $sql4 = "CREATE TABLE $table_name4 (
//          `id` int NOT NULL AUTO_INCREMENT,
//          `csv_file_name` varchar(255) NOT NULL,
//          `email_name` varchar(100) NOT NULL,
//          `email_status` varchar(100) NOT NULL,
//          `email_type` varchar(100) DEFAULT NULL,
//          `safe_to_send` varchar(100) DEFAULT NULL,
//          `verification_response` varchar(100) DEFAULT NULL,
//          `score` varchar(100) DEFAULT NULL,
//          `bounce_type` varchar(100) DEFAULT NULL,
//          `email_acc` varchar(100) DEFAULT NULL,
//          `email_dom` varchar(100) DEFAULT NULL,
//          `create_date` date DEFAULT NULL,
//          `user_id` int DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) $charset_collate;";
//
//        $sql5 = "CREATE TABLE $table_name5 (
//          `id` int NOT NULL AUTO_INCREMENT,
//          `logo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `site_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `scan_time_out` int DEFAULT NULL,
//          `scan_port` int DEFAULT NULL,
//          `scan_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `estimated_cost` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `cost_per_scan` decimal(10,3) DEFAULT NULL,
//          `validation` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `active_addons` varchar(255) DEFAULT 'a:0:{}',
//          `registration_action` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `script_path` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `script_url` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
//          `license_key` varchar(50) DEFAULT NULL,
//          `license_title` varchar(50) DEFAULT NULL,
//          `license_exp` varchar(50) DEFAULT NULL,
//          `license_support` varchar(50) DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) $charset_collate;";
//
//        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//        dbDelta( $sql1 );
//        dbDelta( $sql2 );
//        dbDelta( $sql3 );
//        dbDelta( $sql4 );
//        dbDelta( $sql5 );
//
//        add_option("bulk_email_verify_db_version", "1.0.1");

    }
}
//register_activation_hook( __FILE__,array( 'Bulk_Verify_Email_Activator', 'activate' )  );