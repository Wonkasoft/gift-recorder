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
	add_meta_box( 'member-name', __( 'Member Information', 'text_domain' ), 'Gift_Rec_Member_Meta_Box_layouts', 'Gift_Rec_Members', 'normal', 'high' );

	return;
}

function Gift_Rec_Member_Meta_Box_layouts( $post ) {
	?>
	<table>
		<thead style="text-align: left;">
			<tr>
				<th>
					<label for="post_title"><h3>Full Name</h3></label>
				</th>
				<th>
					<label for="post_date"><h3>Last Modified Date</h3></label>
				</th>
				<th>
					<label for="post_title"><h3>Email</h3></label>
				</th>
				<th>
					<label for="post_date"><h3>Phone Number</h3></label>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input type="text" name="post_title" size="35" id="title" value="<?php echo $post->post_title; ?>" spellcheck="true" autocomplete="off" />
				</td>
				<td>
						<input type="text" name="post_date" size="25" id="date" value="<?php echo $post->post_date; ?>" spellcheck="true" autocomplete="off" />
				</td>
				<td>
					<input type="email" name="post_email" size="35" id="email" value="<?php echo $post->post_email; ?>" spellcheck="true" autocomplete="off" />
				</td>
				<td>
						<input type="phone" name="post_phone" size="15" id="phone" value="<?php echo $post->post_phone; ?>" spellcheck="true" autocomplete="off" />
				</td>
			</tr>
			<tr style="text-align: left;">
				<th>
					<label for="post_city"><h3>City</h3></label>
				</th>
				<th>
					<label for="post_state"><h3>State</h3></label>
				</th>
				<th>
					<label for="post_gift"><h3>Member's Gift</h3></label>
				</th>
			</tr>
			<tr>
				<td>
						<input type="text" name="post_city" size="25" id="city" value="<?php echo $post->post_city; ?>" spellcheck="true" autocomplete="off" />
				</td>
				<td>
					<input type="text" name="post_state" size="25" id="state" value="<?php echo $post->post_state; ?>" spellcheck="true" autocomplete="off" />
				</td>
				<td>
						<input type="text" name="post_gift" size="20" id="gift" value="<?php echo $post->post_gift; ?>" spellcheck="true" autocomplete="off" />
				</td>
			</tr>
		</tbody>
	</table>

	<?php
	return;
}

add_action( 'save_post', 'post_type_save_data', 11, 3 );

function post_type_save_data( $post_ID, $post, $update ) {
	global $wpdb;
	$table_name = $wpdb->prefix . "giftrecorder";
	$name_array = explode( ' ', $post->post_title );
	$first_name = current( $name_array );
	$last_name = end( $name_array );
	$wpdb->insert(
		$table_name,
		array(
			'id' 				=> $post_ID,
			'entry_date' => $post->post_date,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' 		=> '2',
      'phone' 		=> '2',
      'city' 			=> '2',
      'state' 		=> '2',
      'your_gift' => '2'
		),
		array (
			'%s',
			'%d'
		)
	);

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
	'supports'              => array( 'thumbnail', 'comments', 'revisions', 'post-formats' ),
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