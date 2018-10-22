<?php
/**
 * This file is used to find and load the template for the gift recorder page.
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

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

function gift_recorder_template_class( $classes ) {
	global $post;
	if ( $post->post_name == 'spiritual-gifts-classes') :
			
		$output = array();
		foreach ($classes as $class) :
			if ( $class == 'page-template-default') :
				$class = 'gift-recorder-template';
			endif;
			array_push($output, $class );
		endforeach;
		return $output;
	endif;

	return $classes;
}

add_filter( 'body_class', 'gift_recorder_template_class' );