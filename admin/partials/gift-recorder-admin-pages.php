<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 * @author     Wonkasoft <support@wonkasoft.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
* This will check for Wonkasoft Tools Menu, if not found it will make it.
*/
if ( empty ( $GLOBALS['admin_page_hooks']['wonkasoft_menu'] ) ) {

  global $gift_recorder_page;
  
  $gift_recorder_page = 'wonkasoft_menu';
  
  add_menu_page(
    'Wonkasoft',
    'Wonkasoft Tools',
    'manage_options',
    'wonkasoft_menu',
    array( $this,'gift_recorder_settings_page' ),
    plugins_url( "../img/wonka-logo-2.svg", __FILE__ ),
    100
  );

  add_submenu_page(
    'wonkasoft_menu',
    'Gift Recorder',
    'Gift Recorder',
    'manage_options',
    'wonkasoft_menu',
    array( $this,'gift_recorder_settings_page' )
  );

} else {

/**
* This creates option page in the settings tab of admin menu
*/
global $gift_recorder_page;

$gift_recorder_page = 'gift_recorder_settings_page';

add_submenu_page(
  'wonkasoft_menu',
  'Gift Recorder',
  'Gift Recorder',
  'manage_options',
  'gift_recorder_settings_page',
  array( $this,'gift_recorder_settings_page' )
);

}