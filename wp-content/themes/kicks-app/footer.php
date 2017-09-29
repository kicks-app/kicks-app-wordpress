<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
			</div>
		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="navbar navbar navbar-dark bg-dark text-white">
				<div class="container">
					<a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'kicks-app' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'navbar-nav social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>'
								) );
							?>
						</nav><!-- .social-navigation -->
					<?php endif; ?>
					<div class="site-info pull-left">
						<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> |
						<?php bloginfo( 'description' ); ?>
					</div><!-- .site-info -->
					<?php
	          // Secondary menu.
	          wp_nav_menu( array(
	            'menu'              => 'secondary',
	            'menu_class'        => 'navbar-nav nav-secondary pull-right',
	            'theme_location'    => 'secondary',
	            'container'   => false
	          ));
	        ?>
				</div><!-- .container -->
			</div>
		</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
