<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="row">
	<div class="col-lg-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main pt-3" role="main">

			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php if (have_posts()): ?>
					<div class="row">
						<?php while ( have_posts() ) : the_post() // Start the Loop. ?>
							<div class="col-md-6 col-lg-6">
								<?php
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );
								?>
							</div>
						<?php endwhile; // End the loop. ?>
					</div>
				<?php endif; ?>

				<?php
		      // Previous/next page navigation.
		      call_user_func_array(function_exists('wp_bootstrap_posts_pagination') ? 'wp_bootstrap_posts_pagination' : 'the_posts_pagination', array( array(
		        'prev_text'          => __( 'Previous page', 'kicks-app' ),
		        'next_text'          => __( 'Next page', 'kicks-app' ),
		        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kicks-app' ) . ' </span>',
		      ) ) );
				?>

			<?php else : // If no content, include the "No posts found" template. ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div>
	<div class="col-lg-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
