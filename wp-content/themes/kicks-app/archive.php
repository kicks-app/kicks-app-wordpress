<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="row">
	<div class="col-lg-12">
	<section id="primary" class="content-area">
		<main id="main" class="site-main my-3" role="main">
			<?php
				if ( !(is_front_page() || is_home() ) || is_paged() && function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?= post_type_archive_title( '', false ); ?></h1>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</header><!-- .page-header -->
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
		        'prev_text'          => '<i class="fa fa-chevron-left"></i>',
		        'next_text'          => '<i class="fa fa-chevron-right"></i>',
		        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kicks-app' ) . ' </span>',
		      ) ) );
				?>

			<?php else : // If no content, include the "No posts found" template. ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</main><!-- .site-main -->
	</section><!-- .content-area -->
  </div>
  	<div class="col-lg-12">
  <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
