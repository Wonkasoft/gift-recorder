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


add_action( 'wp_ajax_queryData', 'pull_all_data', 10, 1 );

function pull_all_data() {
  // Nonce checking
   if ( !check_ajax_referer( 'gift-recorder-number', 'security' ) ) {
    return wp_send_json_error( 'Invalid Nonce' );
   }
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name =$wpdb->prefix . "giftrecorder";
  $limit = $_POST['limit'];
  $results = $wpdb->get_results( "SELECT * FROM $table_name limit $limit" ); // Query to fetch data from database table and storing in $results
  $results = json_encode($results);
  wp_send_json_success($results);
  wp_die();
}