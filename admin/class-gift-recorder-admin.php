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
	 * @var      string    $GIFT_RECORDER    The ID of this plugin.
	 */
	private $GIFT_RECORDER;

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
	 * @param      string    $GIFT_RECORDER       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $GIFT_RECORDER, $version ) {

		$this->GIFT_RECORDER = $GIFT_RECORDER;
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
			if ( $page == 'toplevel_page_gift-recorder-admin-display' ) {
	    // Enqueue bootstrap CSS
			wp_enqueue_style( $style, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css'), array(), '4.0.0', 'all');
			}
		}
		wp_enqueue_style( $this->GIFT_RECORDER, plugin_dir_url( __FILE__ ) . 'css/gift-recorder-admin.css', array(), $this->version, 'all' );
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

		wp_enqueue_script( $this->GIFT_RECORDER, plugin_dir_url( __FILE__ ) . 'js/gift-recorder-admin.js', array( 'jquery' ), $this->version, false );

		// Check to see if bootstrap js is already enqueue before setting the enqueue
		$bootstrapjs = 'bootstrap-js';
		if ( ! wp_script_is( $bootstrapjs, 'enqueued' ) && ! wp_script_is($bootstrapjs, 'done' ) ) {
			// Check page to load bootstrapjs only on settings page
		 	if ( $page == 'toplevel_page_gift-recorder-admin-display' ) {
			 	// Enqueue bootstrap js
				wp_enqueue_script( $bootstrapjs, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js' ), array( 'jquery' ), '4.0.0', true );
		 	}
		} 
	}

		// Active the Admin / Settings page
	public function gift_recorder_settings_page() {

		global $gift_recorder_options_page;
		$gift_recorder_options_page = 'gift-recorder-admin-display';
		add_menu_page(
			'Options',
			'Gift Recorder',
			'manage_options',
			'gift-recorder-admin-display',
			array( $this,'gift_recorder_display_admin_page' ),
			GIFT_RECORDER_IMG_PATH . "/gift-recorder-logo.svg",
			100
			);
		add_submenu_page(
			'gift-recorder-admin-display',
			'Settings',
			'Settings',
			'manage_options',
			'gift-recorder-admin-display',
			array( $this, 'gift_recorder_display_admin_page' ),
			100
		);
		add_submenu_page( 
			'gift-recorder-admin-display', 
			'Questions', 
			'Questions', 
			'manage_options', 
			'gift-recorder-admin-questions', 
			array( $this, 'gift_recorder_display_admin_questions'),
			'101'
			);
		add_submenu_page( 
			'gift-recorder-admin-display', 
			'User Manger', 
			'User Manger', 
			'manage_options', 
			'gift-recorder-admin-user-manager', 
			array( $this, 'gift_recorder_display_admin_user_manger'),
			'102'
			);
		add_submenu_page( 
			'gift-recorder-admin-display', 
			'Reports', 
			'Reports', 
			'manage_options', 
			'gift-recorder-admin-reports', 
			array( $this, 'gift_recorder_display_admin_reports'),
			'103'
			);
		add_submenu_page( 
			'gift-recorder-admin-display', 
			'Integrations', 
			'Integrations', 
			'manage_options', 
			'gift-recorder-admin-integration', 
			array( $this, 'gift_recorder_display_admin_integrations'),
			'104'
			);
	}

	// To display the setting page for Gift Recorder
	public function gift_recorder_display_admin_page() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-display.php';
	}

	// To display the questions page for Gift Recorder
	public function gift_recorder_display_admin_questions() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-questions.php';
	}

	// To display the user manger page for Gift Recorder
	public function gift_recorder_display_admin_user_manger() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-user-manager.php';
	}

	// To display the reports page for Gift Recorder
	public function gift_recorder_display_admin_reports() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-reports.php';
	}

	// To display the integrations page for Gift Recorder
	public function gift_recorder_display_admin_integrations() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-admin-integrations.php';
	}

	// Create the action links on the plugins page
	public function gift_recorder_add_action_links() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-add-action-links.php';
	}

	// Create the custom post types
	public function gift_recorder_custom_post_types() {
		include plugin_dir_path( __FILE__ ) . 'partials/gift-recorder-custom-post-types.php';
	}
}