<?php
/**
 * The Class of custom fields for the custom post types of Gift Recorder.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 */
if ( !class_exists('GIFT_REC_FIELDS') ) :
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
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_date",
					"title"         => "Last Modified",
					"description"   => "",
					"type"          => "last-modified",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_email",
					"title"         => "Email",
					"description"   => "",
					"type"          => "email",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_phone",
					"title"         => "Phone",
					"description"   => "",
					"type"          => "tel",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_city",
					"title"         => "City",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_state",
					"title"         => "State",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				),
				array(
					"name"          => "post_gift",
					"title"         => "Member's Gift",
					"description"   => "",
					"type"          => "text",
					"scope"         => array( 'gift_rec_members' ),
					"capability"    => "edit_post",
				)
			);

			/**
			 * Initialize the class and set its properties.
			 *
			 * @since    1.0.0
			 */
			public function __construct() {

				$this->grec_prefix = '_grec_custom_';
				$this->grec_post_types = array( 'gift_rec_members' );

				add_action( 'admin_menu', array( &$this, 'create_grec_fields') );
				add_action( 'save_post', array( &$this, 'post_type_save_data'), 10, 2 );
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
				?>
				<div class="form-wrap">
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
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] . '" style="display:inline;"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<input type="checkbox" name="' . $this->grec_prefix . $grec_field['name'] . '" id="' . $this->grec_prefix . $grec_field['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->grec_prefix . $grec_field['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									break;
								}
								case "textarea":
								case "wysiwyg": {
                  // Text area
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] .'"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<textarea name="' . $this->grec_prefix . $grec_field[ 'name' ] . '" id="' . $this->grec_prefix . $grec_field[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ) . '</textarea>';
                  // WYSIWYG
									if ( $grec_field[ 'type' ] == "wysiwyg" ) { ?>
									<script type="text/javascript">
										jQuery( document ).ready( function() {
											jQuery( "<?php echo $this->grec_prefix . $grec_field[ 'name' ]; ?>" ).addClass( "mceEditor" );
											if ( typeof( tinyMCE ) == "object" &amp;&amp; typeof( tinyMCE.execCommand ) == "function" ) {
												tinyMCE.execCommand( "mceAddControl", false, "<?php echo $this->grec_prefix . $grec_field[ 'name' ]; ?>" );
											}
										});
									</script>
									<?php }
									break;
								}
								case "last-modified": {
									// Plain text field
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] .'"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<div id="' . $this->grec_prefix . $grec_field[ 'name' ] .'" class="modified-date">' . $post->post_modified . '</div>';
									break;
								}
								case "email": {
                  // email field
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] .'"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<input type="email" name="' . $this->grec_prefix . $grec_field[ 'name' ] . '" id="' . $this->grec_prefix . $grec_field[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ) . '" />';
									break;
								}
								case "tel": {
                  // email field
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] .'"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<input type="tel" name="' . $this->grec_prefix . $grec_field[ 'name' ] . '" id="' . $this->grec_prefix . $grec_field[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ) . '" />';
									break;
								}
								default: {
                  // Plain text field
									echo '<label for="' . $this->grec_prefix . $grec_field[ 'name' ] .'"><h3>' . $grec_field[ 'title' ] . '</h3></label>';
									echo '<input type="text" name="' . $this->grec_prefix . $grec_field[ 'name' ] . '" id="' . $this->grec_prefix . $grec_field[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ) . '" />';
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

		public function post_type_save_data( $post_id, $post ) {
			if ( !isset( $_POST[ 'member-info-fields_wpnonce' ] ) || !wp_verify_nonce( $_POST[ 'member-info-fields_wpnonce' ], 'member-info-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( ! in_array( $post->post_type, $this->grec_post_types ) )
				return;
			foreach ( $this->grec_fields as $grec_field ) :
				if ( current_user_can( $grec_field['capability'], $post_id ) ) :
					if ( isset( $_POST[ $this->grec_prefix . $grec_field['name'] ] ) && trim( $_POST[ $this->grec_prefix . $grec_field['name'] ] ) ) :
						$value = $_POST[ $this->grec_prefix . $grec_field['name'] ];
            // Auto-paragraphs for any WYSIWYG
						if ( $grec_field['type'] == "wysiwyg" ) $value = wpautop( $value );
						update_post_meta( $post_id, $this->grec_prefix . $grec_field[ 'name' ], $_POST[ $this->grec_prefix . $grec_field['name'] ] );

						if ( $grec_field[ 'name' ] == 'post_full_name' ) :
							$custom_post_update = array(
								'ID' => $post_id,
								'post_title' => htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ),
								'post_name' => sanitize_title( htmlspecialchars( get_post_meta( $post->ID, $this->grec_prefix . $grec_field[ 'name' ], true ) ) ),
							);

							remove_action( 'save_post', array( &$this, 'post_type_save_data'), 10, 2 );

							wp_update_post( $custom_post_update );

							add_action( 'save_post', array( &$this, 'post_type_save_data'), 10, 2 );
						endif;
						
					else :
						delete_post_meta( $post_id, $this->grec_prefix . $grec_field[ 'name' ] );
					endif;
				endif;
			endforeach;

			return;
		} // end post_type_save_data
	} // end class GIFT_REC_FIELDS
endif; // End if class exists statement

if ( class_exists( 'GIFT_REC_FIELDS' ) ) {
	$gift_rec_fields_object = new GIFT_REC_FIELDS();
}