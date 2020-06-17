<?php
/**
 * Contact form 7 & Active Campaign Intergration
 *
 *
 * @link
 * @since             1.0.0
 * @package           ac_cf7_integration
 *
 * @wordpress-plugin
 * Plugin Name:       Contact form 7 & Active Campaign Intergration
 * Plugin URI:        https://github.com/kennym/cf7-to-api
 * Description:       Connect contact forms 7 to ActiveCampaign
 * Version:           1.0.0
 * Author:            Tinh Nguyen
 * Author URI: 		 
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ac-cf7-integration
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'AC_CF7_INTERGRATION_PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );
define( 'AC_CF7_INTERGRATION_INCLUDES_PATH' , plugin_dir_path( __FILE__ ). 'includes/' );
define( 'AC_CF7_INTERGRATION_TEMPLATE_PATH' , get_template_directory() );
define( 'AC_CF7_INTERGRATION_ADMIN_JS_URL' , plugin_dir_url( __FILE__ ). 'assets/js/' );
define( 'AC_CF7_INTERGRATION_ADMIN_CSS_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );
define( 'AC_CF7_INTERGRATION_FRONTEND_JS_URL' , plugin_dir_url( __FILE__ ). 'assets/js/' );
define( 'AC_CF7_INTERGRATION_FRONTEND_CSS_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );
define( 'AC_CF7_INTERGRATION_IMAGES_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );

add_action( 'plugins_loaded', 'qs_cf7_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function qs_cf7_textdomain() {
    load_plugin_textdomain( 'ac-cf7-integration', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
/**
 * The core plugin class
 */
require_once AC_CF7_INTERGRATION_INCLUDES_PATH . 'class.ac-cf7-intergration.php';

/**
 * Activation and deactivation hooks
 *
 */
register_activation_hook( __FILE__ ,  'ac_cf7_intergration_activation_handler'  );
register_deactivation_hook( __FILE__ , 'ac_cf7_intergration_deactivation_handler' );


function ac_cf7_intergration_activation_handler(){
    do_action( 'ac_cf7_intergration_activated' );
}

function ac_cf7_intergration_deactivation_handler(){
    do_action( 'ac_cf7_intergration_deactivated' );
}
/**
 * Begins execution of the plugin.
 *
 * Init the plugin process
 *
 * @since    1.0.0
 */
function init_ac_cf7_api() {
    global $AC_CF7_INTERGRATION;

	$AC_CF7_INTERGRATION = new AC_CF7_atp_integration();
	$AC_CF7_INTERGRATION->version = '1.0.0';
	$AC_CF7_INTERGRATION->plugin_basename = plugin_basename( __FILE__ );

	$AC_CF7_INTERGRATION->init();

}

init_ac_cf7_api();
