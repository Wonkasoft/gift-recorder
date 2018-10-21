<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/public
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/public
 * @author     Wonkasoft <support@wonkasoft.com>
 */
class Gift_Recorder_Public {

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
	 * @param      string    $GIFT_RECORDER       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $GIFT_RECORDER, $version ) {

		$this->GIFT_RECORDER = $GIFT_RECORDER;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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
		$style = 'bootstrap';
		if( ! wp_style_is( $style, 'enqueued' ) &&  ! wp_style_is( $style, 'done' ) ) {
			// Check page to load bootstrapjs only on settings page
			if ( is_page('spiritual-gifts-classes') ) {
	    	// Enqueue bootstrap CSS
			wp_enqueue_style( $style, str_replace( array( 'http:', 'https:' ), '', GIFT_RECORDER_URL . 'admin/css/bootstrap.min.css'), array(), '4.0.0', 'all');
			}
		}
		wp_enqueue_style( $this->GIFT_RECORDER, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'css/gift-recorder-public.css'), array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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
		if ( ! wp_script_is( $bootstrapjs, 'enqueued' ) && ! wp_script_is($bootstrapjs, 'done' ) ) {
			// Check page to load bootstrapjs only on settings page
		 	if ( is_page('spiritual-gifts-classes') ) {
			 	// Enqueue bootstrap js
				wp_enqueue_script( $bootstrapjs, str_replace( array( 'http:', 'https:' ), '', GIFT_RECORDER_URL . 'admin/js/bootstrap.min.js'), array( 'jquery' ), '4.0.0', true );
		 	}
		} 
		wp_enqueue_script( $this->GIFT_RECORDER, str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( __FILE__ ) . 'js/gift-recorder-public.js'), array( 'jquery' ), $this->version, true );

	}

}