<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="row blog-main-page">
<div class="container">
<h1 class="main_heading text-left"><?php the_title(); ?></h1>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				?>
				<div class="row blog-row mb-5">
				<div class="col-lg-5">
		        	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'class'  => "img-responsive" ) ); ?>
		        </div>

		        <div class="col-lg-7">
		        	<!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
		        	<p><?php the_excerpt(); ?></p>
		       	</div>
		       	</div>
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				

			endwhile; // End of the loop.
			?>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
