<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="row">
	<div class="col-lg-8">
    <div id="primary" class="content-area">
    	<main id="main" class="site-main my-3" role="main">
				<?php
					if ( !(is_front_page() || is_home() ) || is_paged() && function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
    		<?php
    		// Start the loop.
    		while ( have_posts() ) : the_post();

    			// Include the page content template.
    			get_template_part( 'template-parts/content', 'page' );

    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) {
    				comments_template();
    			}

    			// End of the loop.
    		endwhile;
    		?>
    	</main><!-- .site-main -->
    </div><!-- .content-area -->
  </div>
	<div class="col-lg-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
