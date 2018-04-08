<?php
/**
* The admin-specific functionality of the plugin.
*
* @link       https://wonkasoft.com
* @since      1.0.0
*
* @package    Gift_Recorder
* @subpackage gift-recorder/admin/partials
*/
/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Gift_Recorder
* @subpackage gift-recorder/admin/partials
* @author     Wonkasoft <info@wonkasoft.com>
*/
/**
 * add_filter for action links
 * @since  1.0.0 [<init>]
 */
add_filter( 'plugin_action_links_'. GIFT_RECORDER_BASENAME, 'gift_recorder_add_settings_link_filter' , 10, 1);

/**
 * [Gift_Recorder_add_settings_link_filter description]
 * @param [type] $links [description]
 */
function gift_recorder_add_settings_link_filter( $links ) { 
 $link_addon = '<a href="admin.php?page=gift-recorder-admin-display" target="_self">Settings</a>';
 array_unshift( $links, $link_addon ); 
 $links[] = '<a href="https://paypal.me/Wonkasoft" target="blank"><img src="' . plugin_dir_url( "gift-recorder" ) . "gift-recorder/admin/img/gift-recorder-logo-2.svg" . '" style="width: 30px; height: 20px; display: inline-block;
       vertical-align: text-top; float: none;" /></a>';
 return $links; 
}

/**
 * 
 */
add_filter( 'plugin_row_meta', 'gift_recorder_add_description_link_filter', 10, 2);

/**
 * [gift_recorder_add_description_link_filter description]
 * @param  [type] $links [description]
 * @param  [type] $file  [description]
 * @return [type]        [description]
 */
function gift_recorder_add_description_link_filter( $links, $file ) {
  if ( strpos($file, 'gift-recorder.php') !== false ) {
    $links[] = '<a href="admin.php?page=gift-recorder-admin-display" target="_self">Settings</a>';
    $links[] = '<a href="https://paypal.me/Wonkasoft" target="blank">Donate <img src="' . plugin_dir_url( "gift-recorder" ) . "gift-recorder/admin/img/gift-recorder-logo-2.svg" . '" style="width: 30px; height: 20px; display: inline-block;
       vertical-align: text-top;" /></a>';
  }
  return $links; 
}