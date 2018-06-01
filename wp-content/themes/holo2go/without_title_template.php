<?php
/**
 * Template Name: Without Title Template
 *
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
	</div>
</div>

<?php get_footer(); ?>
