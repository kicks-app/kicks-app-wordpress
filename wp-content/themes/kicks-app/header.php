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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kicks-app' ); ?></a>
	<header id="masthead" class="site-header fixed-top " role="banner">
		<div class="site-header-main">
		  <!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a> -->
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
				<div class="container">
		      <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>
		      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
						<?php
							// Primary navigation menu.
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'primary',
								'container' => 'false'
							));
					 	?>
		        <!-- <ul class="navbar-nav mr-auto">
		          <li class="nav-item active">
		            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="#">Link</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link disabled" href="#">Disabled</a>
		          </li>
		          <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
		            <div class="dropdown-menu" aria-labelledby="dropdown01">
		              <a class="dropdown-item" href="#">Action</a>
		              <a class="dropdown-item" href="#">Another action</a>
		              <a class="dropdown-item" href="#">Something else here</a>
		            </div>
		          </li>
		        </ul> -->
		        <!-- <form class="form-inline my-2 my-lg-0">
		          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		        </form> -->
		      </div>
				</div>
    </nav>
<?php /*
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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
			*/ ?>
		</div>
	</header><!-- .site-header -->
		<div id="content" class="site-content">
					<div class="container">
