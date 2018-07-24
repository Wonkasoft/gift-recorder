<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gift_Recorder
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'gift-recorder' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'gift-recorder' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'gift-recorder' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'gift-recorder' ) . '</span>')
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();