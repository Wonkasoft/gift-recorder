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
	'taxonomies'            => array( 'category', 'post_tag', 'meta_data' ),
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
	'rewrite'				=> array( 'slug' => 'gift-rec-members'),
);
register_post_type( 'Gift_Rec_Members', $args );

/**
 * Define Custom Post Type
 */
define( 'GIFT_REC_MEMBERS', 'gift_rec_members' );

// Add the custom columns to the book post type:
add_filter( 'manage_gift_rec_members_posts_columns', 'set_custom_git_recorder_columns' );
function set_custom_git_recorder_columns( $columns ) {

	$columns = array_slice( $columns, 0, 2, true ) + array( 'member_email' => 'Email','member_phone' => 'Phone','member_city' => 'City','member_state' => 'State','member_gift' => 'Gift',) + array_slice( $columns, 2, count( $columns ), true );

	return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_gift_rec_members_posts_custom_column' , 'custom_gift_rec_members_column', 10, 2 );
function custom_gift_rec_members_column( $column, $post_id ) {
	
	global $post;
	$meta_keys = get_post_custom_keys( $post->ID );
	$meta_values = get_post_meta( $post->ID );
	switch ( $column ) {

		case 'member_email' :
		foreach ( $meta_keys as $key ) :
			if ( $key == '_grec_post_email' ) :
				?>
				<span class="member-info"><?php echo $meta_values[$key][0]; ?></span>
				<?php
			endif;
		endforeach;
		break;

		case 'member_phone' :
		foreach ( $meta_keys as $key ) :
			if ( $key == '_grec_post_phone' ) :
				?>
				<span class="member-info"><?php echo $meta_values[$key][0]; ?></span>
				<?php
			endif;
		endforeach;
		break;

		case 'member_city' :
		foreach ( $meta_keys as $key ) :
			if ( $key == '_grec_post_city' ) :
				?>
				<span class="member-info"><?php echo $meta_values[$key][0]; ?></span>
				<?php
			endif;
		endforeach;
		break;

		case 'member_state' :
		foreach ( $meta_keys as $key ) :
			if ( $key == '_grec_post_state' ) :
				?>
				<span class="member-info"><?php echo $meta_values[$key][0]; ?></span>
				<?php
			endif;
		endforeach;
		break;

		case 'member_gift' :
		foreach ( $meta_keys as $key ) :
			if ( $key == '_grec_post_gift' ) :
				?>
				<span class="member-info"><?php echo $meta_values[$key][0]; ?></span>
				<?php
			endif;
		endforeach;
		break;
	}
	return;
}

function load_gift_recorder_template( $template ) {
    global $post;

	if ( $post->post_type == 'Gift_Rec_Members') {

		if ( strpos( $template, 'page' ) ) {
			$template = locate_template( array( "gift-recorder/Gift_Rec_Members-page.php" ) );

			if ( $template == '' ) {
				$template = GIFT_RECORDER_PATH . "templates/Gift_Rec_Members-page.php";
			}

    		return $template;
		}

	}

    return $template;
}

add_filter( 'page_template', 'load_rsc_videos_template' );