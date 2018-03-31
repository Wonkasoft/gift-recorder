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
$base =  'gift-recorder/gift-recorder.php';
add_filter( 'plugin_action_links_'. $base, 'Gift_Recorder_add_settings_link_filter' , 10, 1);
function Gift_Recorder_add_settings_link_filter( $links ) { 
 $donate_link = '<a href="https://paypal.me/Wonkasoft" target="blank">Donate</a>';
 $settings_link = '<a href="admin.php?page=gift-recorder-admin-display" target="_self">Settings</a>';
 array_unshift( $links, $settings_link, $donate_link ); 
 return $links; 
}