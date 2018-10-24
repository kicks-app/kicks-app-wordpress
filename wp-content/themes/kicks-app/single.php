<?php
/**
 * The template for displaying all single posts and attachments
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

					// Include the single post content template.
					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            call_user_func_array(function_exists('wp_bootstrap_post_navigation') ? 'wp_bootstrap_post_navigation' : 'the_post_navigation', array( array(
              'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kicks-app' ),
            ) ) );

					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
					  call_user_func_array(function_exists('wp_bootstrap_post_navigation') ? 'wp_bootstrap_post_navigation' : 'the_post_navigation', array( array(
							'next_text' => '<span class="post-title">%title</span>' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'kicks-app' ) . '</span> ' .
								'<span class="meta-nav" aria-hidden="true"><i class="fa fa-chevron-right"></i></span> ',
              'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fa fa-chevron-left"></i></span> ' .
                '<span class="screen-reader-text">' . __( 'Previous post:', 'kicks-app' ) . '</span> ' .
                '<span class="post-title">%title</span>'
            ) ) );
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
