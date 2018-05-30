<?php
/**
 * Holo2go functions and definitions
 *
*/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Holo2go 1.0
 */
function holo2go_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Holo2go 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );


	// Setup the WordPress core custom background feature.

	/**
	 * Filter Holo2go custom-header support arguments.
	 *
	 * @since Holo2go 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );
}
// holo2go_setup
add_action( 'after_setup_theme', 'holo2go_setup' );

add_filter('show_admin_bar', '__return_false');

/**
 * Register widget area.
 *
 * @since Holo2go 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function holo2go_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Links', 'twentyfifteen' ),
		'id'            => 'footer_social_links',
		'description'   => __( 'Add widgets here to appear in your social links on footer area.', 'twentyfifteen' ),
		'before_widget' => '<div id="%1$s" class="social-media %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'holo2go_widgets_init' );



/**
 * Enqueue scripts and styles.
 *
 * @since Holo2go 1.0
 */
function holo2go_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'holo2go-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style( 'holo2go-fonts', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'holo2go-theme-fonts', get_template_directory_uri().'/css/fonts.css');
	wp_enqueue_style( 'holo2go-style', get_stylesheet_uri() );
	wp_enqueue_style( 'holo2go-theme-responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'holo2go_scripts' );


function add_link_atts($atts) {
  $atts['class'] = "nav-link text-uppercase p-0 text-white";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

// Our custom post type function
function create_testimonials_posttype() {
 
    register_post_type( 'testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'supports'            => array( 'title', 'editor', 'thumbnail'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_testimonials_posttype' );


function shortcode_testimonials ( $atts ) {
  $atts = shortcode_atts( array(
    'default' => ''
  ), $atts );
    wp_reset_query();
    $args = array('post_type' => 'testimonials',
      		'posts_per_page'    => -1,
      		'orderby'           => 'menu_order title',
        	'order'             => 'ASC',	
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
     	$count_testimonials = count($loop->posts);
     	?>
		<div id="testimonial_div" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php 
					for ($i=0; $i < $count_testimonials; $i++) { 
						?>
						<li data-target="#testimonial_div" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) { echo 'active'; } ?>"></li>
						<?php
					}
				?>
				<!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
			</ol>
			<div class="carousel-inner" role="listbox">
		     	<?php
		     	$j = 0;
		        while($loop->have_posts()) : $loop->the_post();
		            //echo ' "'.get_the_title().'" ';
		            ?>
					    <div class="carousel-item <?php if($j == 0) { echo 'active'; }?>">
					      	<div class="col-lg-5 comment-section">
						    	<span class="comments text-center"><img class="quote-start" src="<?php echo get_template_directory_uri(); ?>/images/testimonial-quote-start.png" /><?php echo get_field('client_description',get_the_ID()); ?><img class="quote-end" src="<?php echo get_template_directory_uri(); ?>/images/testimonial-quote-end.png" /></span>
						      	<h3 class="client_name text-center"><?php the_title(); ?></h3>
						      	<p class="position text-center"><?php echo get_field('client_position',get_the_ID()); ?></p>
						    </div>
						    <div class="col-lg-7 pr-0 pl-0 slide-section">  	
					      		<?php $getImg = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); //print_r($getImg);?>
					      		<?php the_content(); ?><!-- <img class="image-responsive testimonials_img" src="<?php echo $getImg[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"> -->
					      	</div>
				      	</div>
		            <?php
		            $j++;
		        endwhile;
		        ?>
       		</div>
    	</div>
        <?php 
     }
}
add_shortcode( 'testimonials','shortcode_testimonials' );