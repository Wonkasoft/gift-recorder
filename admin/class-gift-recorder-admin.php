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
class Gift_Recorder_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
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
	 * @since    1.0.0
	 */
	public function enqueue_styles( $page ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gift_Recorder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gift_Recorder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		// Check to see if bootstrap style is already enqueue before setting the enqueue
		$style = 'bootstrap';
		if( ! wp_style_is( $style, 'enqueued' ) &&  ! wp_style_is( $style, 'done' ) ) {
			// Check page to load bootstrapjs only on settings page
			if ( $page == 'toplevel_page_wonkasoft_menu' ||  $page == 'tools_page_gift_recorder_settings_page') {
	    	// Enqueue bootstrap CSS
			wp_enqueue_style( $style, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css'), array(), '4.0.0', 'all');
			}
		}
		wp_enqueue_style( $this->plugin_name, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'css/gift-recorder-admin.css'), array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $page ) {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gift_Recorder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gift_Recorder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		// Check to see if bootstrap js is already enqueue before setting the enqueue
		$bootstrapjs = 'bootstrap-js';
		// Check page to load bootstrapjs only on settings page
	 	if ( $page == 'toplevel_page_wonkasoft_menu' ||  $page == 'tools_page_gift_recorder_settings_page') {
			
			wp_enqueue_script( $this->plugin_name. '-admin-js', plugin_dir_url( __FILE__ ) . 'js/gift-recorder-admin.js', array( 'jquery' ), $this->version, true );
			
			// Creating a localize script for the ajax features
			wp_localize_script( $this->plugin_name . '-admin-js', 'GIFT_RECORDER_KIT', array(
			'security' => wp_create_nonce( 'gift-recorder-number' ),
			'success' => 'Your options were successfully updated.',
			'failure' => 'There was an error updating your options.'
			));

			if ( ! wp_script_is( $bootstrapjs, 'enqueued' ) && ! wp_script_is($bootstrapjs, 'done' ) ) {
			 	// Enqueue bootstrap js
				wp_enqueue_script( $bootstrapjs, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js' ), array( 'jquery' ), '4.0.0', true );

		 	}
		} 
	}

	// Create the action links on the plugins page
	public function gift_recorder_add_action_links() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-add-action-links.php';
	}

	public function gift_recorder_admin_pages() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-pages.php';
	}

	/**
	* [gift_recorder_settings_page This function displays the admin settings page]
	*
	* @since 1.0.0
	*/
	public function gift_recorder_settings_page() {
	  include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-display.php';
	}
}