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
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2">
				<div class="logo">
					<a href="#" title="Holo2go">
						<img src="<?php bloginfo('template_url')?>/images/logo.png" class="img-responsive">
					</a>
				</div>
			</div>
			<div class="col-xl-9">
				<nav class="navbar navbar-expand-xl justify-content-end">
					<ul class="navbar-nav">
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Products</a>
						</li>
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Solutions</a>
						</li>
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Accessories</a>
						</li>
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Design</a>
						</li>
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Blog</a>
						</li>
						<li class="nav-item ml-3 mr-3">
							<a class="nav-link text-uppercase p-0" href="#">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
<div id="page" class="hfeed site">