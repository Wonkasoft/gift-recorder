<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wonkasoft.com
 * @since             1.0.0
 * @package           Gift_Recorder
 *
 * @wordpress-plugin
 * Plugin Name:       Gift Recorder
 * Plugin URI:        https://wonkasoft.com/gift-recorder
 * Description:       Wonkasoft's Gift Recorder is a plugin that was designed for a spiritual gifts assessment test which is a helpful tool that will help discover his or her specific gifts.
 * Version:           1.0.0
 * Author:            Wonkasoft
 * Author URI:        https://wonkasoft.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gift-recorder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

define( 'GIFT_RECORDER_PATH', plugin_dir_path( __FILE__ ) );
define( 'GIFT_RECORDER_NAME', plugin_basename( dirname( __FILE__ ) ) );
define( 'GIFT_RECORDER_URL', plugins_url( GIFT_RECORDER_NAME . '/' ) );
define( 'GIFT_RECORDER_BASENAME', plugin_basename( __FILE__ ) );
define( 'GIFT_RECORDER_IMG_PATH', plugins_url( GIFT_RECORDER_NAME . '/admin/img' ) );
define( 'GIFT_RECORDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gift-recorder-activator.php
 */
function activate_gift_recorder() {
	require_once GIFT_RECORDER_PATH . 'includes/class-gift-recorder-activator.php';
	Gift_Recorder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gift-recorder-deactivator.php
 */
function deactivate_gift_recorder() {
	require_once GIFT_RECORDER_PATH . 'includes/class-gift-recorder-deactivator.php';
	Gift_Recorder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gift_recorder' );
register_deactivation_hook( __FILE__, 'deactivate_gift_recorder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require GIFT_RECORDER_PATH . 'includes/class-gift-recorder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gift_recorder() {
	
	$plugin = new Gift_Recorder();
	$plugin->run();

}
run_gift_recorder();