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
			<?php // First content instruction page ?>
			<div class="instruction-content">
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
			</div><!-- /instruction-content -->

			<?php // Second content gateways page ?>
			<div class="gateways-content">
				<div class="row">
					<div class="col">
					<h2 class="gateways-title">Since my early childhood, I have most enjoyed and I feel I have done my best when spending time...</h2>
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col-1 left-color-quietly-alone">
					</div>
					<div class="col">
					<h3 class="quietly-alone-title"><a href="#">Quietly Alone:</a></h3>
					<ul class="quietly-alone-list">
						<li class="quietly-alone-item-1">
							<span>Thinking</span>
						</li>
						<li class="quietly-alone-item-2">
							<span>Listening to Music or Tapes</span>
						</li>
						<li class="quietly-alone-item-3">
							<span>Reading</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
					<div class="col-1 left-color-body-physical">
					</div>
					<div class="col">
					<h3 class="body-physical-title"><a href="#">Using My Body and Physical Energy to Work with:</a></h3>
					<ul class="body-physical-list">
						<li class="body-physical-item-1">
							<span>Objects</span>
						</li>
						<li class="body-physical-item-2">
							<span>Plants</span>
						</li>
						<li class="body-physical-item-3">
							<span>Tools</span>
						</li>
						<li class="body-physical-item-4">
							<span>Materials</span>
						</li>
						<li class="body-physical-item-5">
							<span>Or Being outdoors</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col-1 left-color-tasks-people">
					</div>
					<div class="col">
					<h3 class="tasks-people-title"><a href="#">Organizing Tasks and People:</a></h3>
					<ul class="tasks-people-list">
						<li class="tasks-people-item-1">
							<span>Structuring</span>
						</li>
						<li class="tasks-people-item-2">
							<span>Carrying Out Details</span>
						</li>
						<li class="tasks-people-item-3">
							<span>Supporting Tasks and People</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
					<div class="col-1 left-color-information-various-kinds">
					</div>
					<div class="col">
					<h3 class="information-various-kinds-title"><a href="#">Thinking about Information of Various Kinds:</a></h3>
					<ul class="information-various-kinds-list">
						<li class="information-various-kinds-item-1">
							<span>Observation</span>
						</li>
						<li class="information-various-kinds-item-2">
							<span>Reading</span>
						</li>
						<li class="information-various-kinds-item-3">
							<span>Investigating</span>
						</li>
						<li class="information-various-kinds-item-4">
							<span>Solving</span>
						</li>
						<li class="information-various-kinds-item-5">
							<span>Distingguishing Truth</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col-1 left-color-people-groups">
					</div>
					<div class="col">
					<h3 class="people-groups-title"><a href="#">With other people in groups:</a></h3>
					<ul class="people-groups-list">
						<li class="people-groups-item-1">
							<span>Leading</span>
						</li>
						<li class="people-groups-item-2">
							<span>Guiding</span>
						</li>
						<li class="people-groups-item-3">
							<span>Managing</span>
						</li>
						<li class="people-groups-item-4">
							<span>Information</span>
						</li>
						<li class="people-groups-item-5">
							<span>Training</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
					<div class="col-1 left-color-other-people-equals">
					</div>
					<div class="col">
					<h3 class="other-people-equals-title"><a href="#">With Other People As Equals:</a></h3>
					<ul class="other-people-equals-list">
						<li class="other-people-equals-item-1">
							<span>Talking</span>
						</li>
						<li class="other-people-equals-item-2">
							<span>Being Together</span>
						</li>
						<li class="other-people-equals-item-3">
							<span>Helping</span>
						</li>
						<li class="other-people-equals-item-4">
							<span>Entertaining</span>
						</li>
						<li class="other-people-equals-item-5">
							<span>Comforting</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col-1 left-color-imagination">
					</div>
					<div class="col">
					<h3 class="imagination-title"><a href="#">Using My Imagination:</a></h3>
					<ul class="imagination-list">
						<li class="imagination-item-1">
							<span>Dreaming</span>
						</li>
						<li class="imagination-item-2">
							<span>Innovating</span>
						</li>
						<li class="imagination-item-3">
							<span>Inventing</span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col text-center">
					<button type="button" class="get-started-btn">Back</button>
					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /gateways-content -->

			<?php // Gifts content Quietly Alone page ?>
			<div class="quietly-alone-content">
				<div class="row">
					<div class="col">
					<h2 class="quietly-alone-gifts-title">Quietly Alone</h2>
					</div><!-- /col -->
				</div><!-- /row -->
				<div class="row">
					<div class="col">
					<ul class="quietly-alone-gifts-list">
						<li class="quietly-alone-gift-item-1">
							<span><a href="#">Discernment</a></span>
						</li>
						<li class="quietly-alone-gift-item-2">
							<span><a href="#">Intercession</a></span>
						</li>
						<li class="quietly-alone-gift-item-3">
							<span><a href="#">Faith</a></span>
						</li>
						<li class="quietly-alone-gift-item-4">
							<span><a href="#">Prophecy</a></span>
						</li>
					</ul><!-- /quietly-alone-list -->
					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /quietly-alone-content -->

		</main><!-- #main -->
</div><!-- .wrap -->

<?php
get_footer();