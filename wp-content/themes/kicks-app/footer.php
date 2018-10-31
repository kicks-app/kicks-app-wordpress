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

		<footer id="colophon" class="site-footer bg-dark text-light small" role="contentinfo">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="site-info py-2">
							<a class="text-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
							<!--<span class="d-inline-block"><?php bloginfo( 'description' ); ?></span>-->
						</div><!-- .site-info -->
					</div>
					<div class="col-lg-4">
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'kicks-app' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'nav nav-social justify-content-lg-center social-navigation',
									'depth'          => 1,
									'container' 		 => false
								) );
							?>
						</nav><!-- .social-navigation -->
					</div>
					<div class="col-lg-4">
						<?php
							// Secondary menu.
							wp_nav_menu( array(
								'menu'              => 'secondary',
								'menu_class'        => 'nav nav-secondary justify-content-lg-end',
								'theme_location'    => 'secondary',
								'container'   			=> false
							));
						?>
					</div>
				</div>
			</div><!-- .container -->
	</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
