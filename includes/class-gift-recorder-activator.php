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
        $table_name = $wpdb->prefix . "giftrecorder";
        $installed_ver = get_option( 'gift_recorder_database_version' );

        if ( $installed_ver != GIFT_RECORDER_VERSION ) :
          $sql = "CREATE TABLE $table_name (
            id INT(10) NOT NULL AUTO_INCREMENT,
            entry_date TIMESTAMP NOT NULL,
            first_name VARCHAR(150) NOT NULL,
            last_name VARCHAR(150) NOT NULL,
            email VARCHAR(150) NOT NULL,
            address LONGTEXT NOT NULL,
            city VARCHAR(150) NOT NULL,
            state VARCHAR(16) NOT NULL,
            zip VARCHAR(16) NOT NULL,
            phone VARCHAR(150) NOT NULL,
            birth_date DATE NOT NULL,
            your_gift LONGTEXT NOT NULL,
            score LONGTEXT NOT NULL,
            PRIMARY KEY (id) 
            )$charset_collate";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
            update_option( 'gift_recorder_database_version', GIFT_RECORDER_VERSION );
        else: 
            $sql = "CREATE TABLE $table_name (
              id INT(10) NOT NULL AUTO_INCREMENT,
              entry_date TIMESTAMP NOT NULL,
              first_name VARCHAR(150) NOT NULL,
              last_name VARCHAR(150) NOT NULL,
              email VARCHAR(150) NOT NULL,
              address LONGTEXT NOT NULL,
              city VARCHAR(150) NOT NULL,
              state VARCHAR(16) NOT NULL,
              zip VARCHAR(16) NOT NULL,
              phone VARCHAR(150) NOT NULL,
              birth_date DATE NOT NULL,
              your_gift LONGTEXT NOT NULL,
              score LONGTEXT NOT NULL,
              PRIMARY KEY (id) 
              )$charset_collate";

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