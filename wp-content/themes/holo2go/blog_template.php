<?php
/**
 * Template Name: Blog Template
 *
 */

get_header(); ?>
<div class="row">
	<div class="container blog-main-page pb-5">
		<h1 class="main_heading">Our Blogs</h1>
		<?php 
		// the query
		$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
		 
		<?php if ( $wpb_all_query->have_posts() ) : ?>
		 
		 
		    <!-- the loop -->
		    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
		<div class="row blog-row mt-5">
		        <div class="col-lg-5">
		        	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'class'  => "img-responsive" ) ); ?>
		        </div>

		        <div class="col-lg-7">
		        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		        	<p><?php the_excerpt(); ?></p>
		       	</div>
		</div>
		    <?php endwhile; ?>
		    <!-- end of the loop -->
		 
		 
		    <?php wp_reset_postdata(); ?>
		 
		<?php else : ?>
		    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
