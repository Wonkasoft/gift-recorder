<?php
/**
 * The custom post types of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 */

function Gift_Rec_Member_Meta_Boxes() {
	if ( !class_exists('GIFT_REC_FIELDS') ) :
		/**
		 * The Class of custom fields for the custom post types of Gift Recorder.
		 *
		 * @link       https://wonkasoft.com
		 * @since      1.0.0
		 *
		 * @package    Gift_Recorder
		 * @subpackage Gift_Recorder/admin
		 */
		class GIFT_REC_FIELDS {
			/**
			 * The prefix for these fields.
			 *
			 * @since    1.0.0
			 * @access   private
			 * @var      string    $grec_prefix    The prefix for these fields.
			 */
			private $grec_prefix;

			/**
			 * The custom post type of this plugin.
			 *
			 * @since    1.0.0
			 * @access   private
			 * @var      string    $grec_post_type    The custom post type of this plugin.
			 */
			private $grec_post_types;

			/**
			 * The version of this plugin.
			 *
			 * @since    1.0.0
			 * @access   private
			 * @var      string    $grec_post_type    The custom post type of this plugin.
			 */
			private $grec_fields = array( 
				array(
					"name"          => "post_full_name",
					"title"         => "Full Name",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_date",
					"title"         => "Last Modified",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_email",
					"title"         => "Email",
					"description"   => "",
					"type"          => "email",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_phone",
					"title"         => "Phone",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_city",
					"title"         => "City",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_state",
					"title"         => "State",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				),
				array(
					"name"          => "post_gift",
					"title"         => "Member's Gift",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( "post" ),
					"capability"    => "edit_post"
				)
			);

			/**
			 * Initialize the class and set its properties.
			 *
			 * @since    1.0.0
			 */
			public function __construct() {

				$this->grec_prefix = '_grec_custom_';
				$this->grec_post_types = array( 'Gift_Rec_Members' );

				add_action( 'admin_menu', array( $this, 'create_grec_fields') );
				add_action( 'save_post', array( $this, 'post_type_save_data'), 10, 3 );
			}

			public function create_grec_fields() {
				if ( function_exists( 'add_meta_box' ) ) :
					foreach ( $this->grec_post_types as $post_type ) :
						add_meta_box( 'member-info-fields', __( 'Member Information', 'text_domain' ), array( $this, 'Gift_Rec_Member_Meta_Box_layouts' ), $post_type, 'normal', 'high' );
					endforeach;
				endif;
			} // end create_grec_fields

			public function Gift_Rec_Member_Meta_Box_layouts() {
				global $post;
				var_dump($post);
				?>
				<div class="table-wrap">
					<?php wp_nonce_field( 'member-info-fields', 'member-info-fields_wpnonce', false, true );
					foreach ( $this->grec_fields as $grec_field ) :
						// Check Scope
						$scope = $grec_field['scope'];
						$output = false;
						foreach ( $scope as $scopeItem ) :
							switch ( $scopeItem ) {
								default: {
									if ( $post->post_type == $scopeItem )
										$output = true;
									break;
								}
							}
							if ( $output ) break;
						endforeach;
						// Check capability
						if ( !current_user_can( $grec_field['capability'], $post->ID ) ) :
							$output = false;
						endif;
                    	// Output if allowed
						if ( $output ) : ?>
						<div class="form-field form-required">
							<?php
							switch ( $grec_field[ 'type' ] ) {
								case "checkbox": {
                                    // Checkbox
									echo '<label for="' . $this->prefix . $grec_field[ 'name' ] . '" style="display:inline;"><b>' . $grec_field[ 'title' ] . '</b></label>';
									echo '<input type="checkbox" name="' . $this->prefix . $grec_field['name'] . '" id="' . $this->prefix . $grec_field['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $grec_field['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									break;
								}
								case "textarea":
								case "wysiwyg": {
                                    // Text area
									echo '<label for="' . $this->prefix . $grec_field[ 'name' ] .'"><b>' . $grec_field[ 'title' ] . '</b></label>';
									echo '<textarea name="' . $this->prefix . $grec_field[ 'name' ] . '" id="' . $this->prefix . $grec_field[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $grec_field[ 'name' ], true ) ) . '</textarea>';
                                    // WYSIWYG
									if ( $grec_field[ 'type' ] == "wysiwyg" ) { ?>
									<script type="text/javascript">
										jQuery( document ).ready( function() {
											jQuery( "<?php echo $this->prefix . $grec_field[ 'name' ]; ?>" ).addClass( "mceEditor" );
											if ( typeof( tinyMCE ) == "object" &amp;&amp; typeof( tinyMCE.execCommand ) == "function" ) {
												tinyMCE.execCommand( "mceAddControl", false, "<?php echo $this->prefix . $grec_field[ 'name' ]; ?>" );
											}
										});
									</script>
									<?php }
									break;
								}
								default: {
                                    // Plain text field
									echo '<label for="' . $this->prefix . $grec_field[ 'name' ] .'"><b>' . $grec_field[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $grec_field[ 'name' ] . '" id="' . $this->prefix . $grec_field[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $grec_field[ 'name' ], true ) ) . '" />';
									break;
								}
							}
							?>
							<?php if ( $grec_field[ 'description' ] ) echo '<p>' . $grec_field[ 'description' ] . '</p>'; ?>
						</div>
						<?php
						endif;
					endforeach;
					?>	
				</div>
			<?php
			return;
		} // end Gift_Rec_Member_Meta_Box_layouts

		public function post_type_save_data( $post_ID, $post, $update ) {
			global $wpdb;
			$table_name = $wpdb->prefix . "giftrecorder";
			$name_array = explode( ' ', $post->post_title );
			$first_name = current( $name_array );
			$last_name = end( $name_array );
			$wpdb->insert(
				$table_name,
				array(
					'id' 		=> $post_ID,
					'entry_date' => $post->post_date,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'email' 	=> '2',
					'phone' 	=> '2',
					'city' 		=> '2',
					'state' 	=> '2',
					'your_gift' => '2'
				),
				array (
					'%s',
					'%d'
				)
			);

			return;
		} // end post_type_save_data
	} // end class GIFT_REC_FIELDS
endif; // End if class exists statement

// if ( class_exists( 'GIFT_REC_FIELDS' ) ) {
// 	$gift_rec_fields_object = new GIFT_REC_FIELDS();
// }

return;
}

/**
 * Registering Custom Post types
 */
// Register Custom Post Type Members
$labels = array(
	'name'                  => _x( 'Members', 'Post Type General Name', 'text_domain' ),
	'singular_name'         => _x( 'Member', 'Post Type Singular Name', 'text_domain' ),
	'menu_name'             => __( 'Gift Recorder', 'text_domain' ),
	'name_admin_bar'        => __( 'Gift Recorder', 'text_domain' ),
	'archives'              => __( 'Member Archives', 'text_domain' ),
	'attributes'            => __( 'Member Attributes', 'text_domain' ),
	'parent_item_colon'     => __( 'Parent Member:', 'text_domain' ),
	'all_items'             => __( 'All Members', 'text_domain' ),
	'add_new_item'          => __( 'Add New Member', 'text_domain' ),
	'add_new'               => __( 'New Member', 'text_domain' ),
	'new_item'              => __( 'New Member', 'text_domain' ),
	'edit_item'             => __( 'Edit Member', 'text_domain' ),
	'update_item'           => __( 'Update Member', 'text_domain' ),
	'view_item'             => __( 'View Member', 'text_domain' ),
	'view_items'            => __( 'View Members', 'text_domain' ),
	'search_items'          => __( 'Search Members', 'text_domain' ),
	'not_found'             => __( 'No members found', 'text_domain' ),
	'not_found_in_trash'    => __( 'No members found in Trash', 'text_domain' ),
	'featured_image'        => __( 'Avatar Image', 'text_domain' ),
	'set_featured_image'    => __( 'Set avatar image', 'text_domain' ),
	'remove_featured_image' => __( 'Remove avatar image', 'text_domain' ),
	'use_featured_image'    => __( 'Use as avatar image', 'text_domain' ),
	'insert_into_item'      => __( 'Insert into member', 'text_domain' ),
	'uploaded_to_this_item' => __( 'Uploaded to this member', 'text_domain' ),
	'items_list'            => __( 'Members list', 'text_domain' ),
	'items_list_navigation' => __( 'Members list navigation', 'text_domain' ),
	'filter_items_list'     => __( 'Filter members list', 'text_domain' ),
);
$args = array(
	'label'                 => __( 'Member', 'text_domain' ),
	'description'           => __( 'Member information pages.', 'text_domain' ),
	'labels'                => $labels,
	'supports'              => array( 'title', 'thumbnail', 'comments', 'revisions', 'post-formats' ),
	'taxonomies'            => array( 'category', 'post_tag' ),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'               => true,
	'show_in_menu'          => true,
	'menu_position'         => 150,
	'menu_icon'             => GIFT_RECORDER_IMG_PATH . "/gift-recorder-logo.svg",
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => true,
	'can_export'            => true,
	'has_archive'           => true,
	'exclude_from_search'   => false,
	'publicly_queryable'    => true,
	'query_var'             => 'GrecMember',
	'capability_type'       => 'post',
	'show_in_rest'          => true,
	'register_meta_box_cb'  => 'Gift_Rec_Member_Meta_Boxes'
);
register_post_type( 'Gift_Rec_Members', $args );
/**
 * Define Custom Post Type
 */
define( 'GIFT_REC_MEMBERS', 'Gift_Rec_Members' );
return;