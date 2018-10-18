<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?= is_admin_bar_showing() ? 'admin-bar' : ''; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(
	(is_front_page() || is_home() ) && !is_paged() && has_header_image() ? 'header-image' : ''
); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kicks-app' ); ?></a>
	<header id="masthead" class="site-header fixed-top bg-dark" role="banner">
		<div class="site-header-main">
			<nav class="navbar navbar-expand-md navbar-dark">
				<div class="container">
		      <a class="navbar-brand font-weight-bold" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
		      <a class="navbar-toggler border-0 p-0" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="hamburger hamburger--squeeze">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</span>
		      </a>
		      <div class="collapse navbar-collapse" id="navbarCollapse">
						<?php
							// Primary navigation menu.
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'primary',
								'menu_class' => 'ml-auto navbar-nav',
								'container' => false
							));
						?>
		      </div>
				</div>
    	</nav>
		</div>
	</header><!-- .site-header -->


	<?php if ( (is_front_page() || is_home() ) && !is_paged() && has_header_image() ) : ?>
		<div class="stage jumbotron jumbotron-fluid mb-0" style="background: url('<?= get_header_image() ?>') no-repeat center; background-size: cover;">
			<!-- <img class="stage-img" src="<?= get_header_image() ?>"/> -->
		</div>
	<?php endif; ?>

		<div id="content" class="site-content py-3">
			<div class="container">
