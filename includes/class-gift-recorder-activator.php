<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/includes
 * @author     Wonkasoft <support@wonkasoft.com>
 */
class Gift_Recorder_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
    
    global $wpdb;
    
    $table_name =$wpdb->prefix . "giftrecorder";

    if ( $wpdb->get_var('SHOW TABLES LIKE ' . $table_name) != $table_name ) {
      $sql = 'CREATE TABLE ' .$table_name . '(
        id INTEGER(10) UNSIGNED AUTO_INCREMENT,
        entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        first_name VARCHAR(150),
        list_name VARCHAR(150),
        email VARCHAR(150),
        phone VARCHAR(150),
        city VARCHAR(150),
        state VARCHAR(16),
        your_gift VARCHAR(50),
        PRIMARY KEY (id) )';

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'gift_recorder_database_version', '1.0' );
    }
	}
}