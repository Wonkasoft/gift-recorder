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
        $charset_collate = $wpdb->get_charset_collate();
        $table_name =$wpdb->prefix . "giftrecorder";

        if ( $wpdb->get_var('SHOW TABLES LIKE ' . $table_name) != $table_name ) :
          $sql = "CREATE TABLE $table_name (
            id INT(10) NOT NULL AUTO_INCREMENT,
            entry_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            first_name VARCHAR(150) DEFAULT '' NOT NULL,
            last_name VARCHAR(150) DEFAULT '' NOT NULL,
            email VARCHAR(150) DEFAULT '' NOT NULL,
            phone VARCHAR(150) DEFAULT '' NOT NULL,
            city VARCHAR(150) DEFAULT '' NOT NULL,
            state VARCHAR(16) DEFAULT '' NOT NULL,
            your_gift VARCHAR(50) DEFAULT '' NOT NULL,
            PRIMARY KEY (id) 
            )$charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

            update_option( 'gift_recorder_database_version', GIFT_RECORDER_VERSION );
        else :
            $installed_ver = get_option( "gift_recorder_database_version" );
            $sql = "CREATE TABLE $table_name (
              id INT(10) NOT NULL AUTO_INCREMENT,
              entry_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
              first_name VARCHAR(150) DEFAULT '' NOT NULL,
              last_name VARCHAR(150) DEFAULT '' NOT NULL,
              email VARCHAR(150) DEFAULT '' NOT NULL,
              phone VARCHAR(150) DEFAULT '' NOT NULL,
              city VARCHAR(150) DEFAULT '' NOT NULL,
              state VARCHAR(16) DEFAULT '' NOT NULL,
              your_gift VARCHAR(50) DEFAULT '' NOT NULL,
              PRIMARY KEY (id) 
              )$charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
            update_option( 'gift_recorder_database_version', GIFT_RECORDER_VERSION );
        endif;

        // create post object
        $page = array(
          'post_title'  => __( 'Spiritual Gifts Classes' ),
          'post_status' => 'publish',
          'post_author' => $current_user->ID,
          'post_type'   => 'page',
        );

        if ( get_page_by_title( 'Spiritual Gifts Classes' ) ) {
            
            // insert the post into the database
            wp_update_post( $page );
        } else {
            
            // insert the post into the database
            wp_insert_post( $page );
        }
    }
}