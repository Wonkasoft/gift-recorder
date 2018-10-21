<?php
/**
 *
 * 
 */

function load_gift_recorder_template( $template ) {
    global $post;

	if ( $post->post_name == 'spiritual-gifts-classes') {

		if ( strpos( $template, 'page' ) ) {
			$template = locate_template( array( "gift-recorder/gifts-page.php" ) );

			if ( $template == '' ) {
				$template = GIFT_RECORDER_PATH . "templates/gifts-page.php";
			}

    		return $template;
		}

	}

    return $template;
}

add_filter( 'page_template', 'load_gift_recorder_template' );