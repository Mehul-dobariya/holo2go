<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Holo2go
 * @since Holo2go 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container-fluid">
		<div class="row align-items-center top-header">
			<div class="col-md-2 col-xl-2 header-logo">
				<div class="logo">
					<a href="<?php echo get_site_url();?>" title="Holo2go">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							if ( has_custom_logo() ) {
							        echo '<img src="'. esc_url( $logo[0] ) .'" class="img-responsive">';
							}
						?>
					</a>
				</div>
			</div>
			<div class="col-md-10 col-xl-10 header-nav">
				<nav class="navbar navbar-expand-xl justify-content-end p-0">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu'        => 'Header Menu',
						'menu_class'  => 'navbar-nav'
					) ); ?>
				</nav>
			</div>
		</div>
	</div>
</header>
<div id="page" class="hfeed site">