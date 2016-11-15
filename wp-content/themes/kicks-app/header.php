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
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<aside id="offcanvas-left" class="offcanvas offcanvas-left">
		Hello World Left
	</aside>
	<aside id="offcanvas-right" class="offcanvas offcanvas-right">
		Hello World Right
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>

<p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>

<p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>

<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>


	</aside>


<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>
	<header id="masthead" class="site-header pos-f-t-r" role="banner">
		<div class="site-header-main">
		  <!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a> -->

			<nav class="pos-f-t navbar navbar-light bg-faded">
				<div class="container">
					<button class="navbar-brand hidden-md-up" type="button" data-toggle="offcanvas" data-target="#offcanvas-left" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						Left
					</button>
				  <!-- <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbar-content aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button> -->
					<button class="hidden-md-up" type="button" data-toggle="offcanvas" data-target="#offcanvas-right" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						Right
					</button>
					<div class="navbar-toggleable-sm collapse" id="navbar-content">
				    <?php
			            // Primary navigation menu.
			            wp_nav_menu( array(
			              'menu'              => 'primary',
			              'theme_location'    => 'primary',
			              'container' => 'false'
			            ));
			         ?>
				  </div>
				</div><!-- .site-header-main -->
			</nav>
		</div>
	</header><!-- .site-header -->
		<div id="content" class="site-content">
					<div class="container">
