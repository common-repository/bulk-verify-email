<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       None
 * @since      1.0.1
 *
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bulk_Verify_Email
 * @subpackage Bulk_Verify_Email/admin
 * @author     Xiao Sun <835468954@qq.com>
 */
class Bulk_Verify_Email_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bulk_Verify_Email_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bulk_Verify_Email_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bulk-verify-email-admin.css', array(), $this->version, 'all' );
        wp_register_style('pr-all',plugin_dir_url( __FILE__ ).'css/all.min.css');
        wp_register_style('pr-sb-admin-2',plugin_dir_url( __FILE__ ).'css/sb-admin-2.css');
        wp_register_style('pr-style',plugin_dir_url( __FILE__ ).'css/style.css');

        wp_enqueue_style( 'pr-all' );
        wp_enqueue_style( 'pr-sb-admin-2' );
        wp_enqueue_style( 'pr-style' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bulk_Verify_Email_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bulk_Verify_Email_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_register_script('pr-jquery-cookie',plugin_dir_url( __FILE__ ).'js/jquery.cookie.min.js');
        wp_register_script('pr-bootstrap-bundle',plugin_dir_url( __FILE__ ).'js/bootstrap.bundle.min.js');
        wp_register_script('pr-chart',plugin_dir_url( __FILE__ ).'js/chart.min.js');
        wp_register_script('pr-sweetalert',plugin_dir_url( __FILE__ ).'js/sweetalert.min.js');

        wp_enqueue_script( 'pr-jquery-cookie' );
        wp_enqueue_script( 'pr-bootstrap-bundle' );
        wp_enqueue_script( 'pr-chart' );
        wp_enqueue_script( 'pr-sweetalert' );

//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bulk-verify-email-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Add an options page under the Settings submenu
     *
     * @since  1.0.1
     */
    public function add_options_page() {

        $this->plugin_screen_hook_suffix = add_menu_page(
            __( 'Bulk Verify Email', 'bulk-verify-email' ),
            __( 'Bulk Verify Email', 'bulk-verify-email' ),
            'manage_options',
            $this->plugin_name,
            array( $this, 'display_options_page' )
        );

    }


    /**
     * Render the options page for plugin
     *
     * @since  1.0.1
     */
    public function display_options_page() {
        include_once 'partials/bulk-verify-email-admin-display.php';
    }

}
