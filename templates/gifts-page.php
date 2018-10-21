<?php
/**
 * The template for displaying all page posts for Gift Recorder
 *
 * To modify this template copy this file into a folder named gift-recorder inside your child theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gift_Recorder
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); 
?>

<div class="wrap">
		<main id="main" class="container-fluid  site-main" role="main">
			<div class="row">
				<div class="col">
					<img src="<?php echo GIFT_RECORDER_IMG_PATH . '/gatewaysHeader.jpg'; ?>" class="gift-recorder-header-image" />
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col">
				<h2 class="instruction-title">Instructions</h2>
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col">
				<h3 class="step-title">Step 1: Choosing</h3>
				<p>Pick the one gate that best completes the statement for you. Open that gate.</p>
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col">
				<h3 class="step-title">Step 2: Confirming</h3>
				<p>Read the statements inside to see if most of them accurately describe you. If not, choose a gate which more closely fits how you would describe yourself. Rad those statements to confirm your choice.</p>
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col">
				<h3 class="step-title">Step 3: Naming</h3>
				<p>Open the second flap to reveal the list of your possible gift.</p>
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col">
				<h3 class="step-title">Step 4: Defining</h3>
				<p>Find the card for the figts listed in the open gate. Rad the five statements on each card. React to each statement, rating each from 0 (does not apply to me) to 4 (strongly applies). Add the total for each gift to determine choices among gifts or the relative strength of gifts for you.</p>
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col text-center">
				<button type="button" class="get-started-btn">Get Started</button>
				</div><!-- /col -->
			</div><!-- /row -->
		</main><!-- #main -->
</div><!-- .wrap -->

<?php
get_footer();