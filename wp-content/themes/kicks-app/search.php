<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="row">
  <div class="col-lg-8">
  	<section id="primary" class="content-area">
  		<main id="main" class="site-main my-3" role="main">
        <?php
  				if ( !(is_front_page() || is_home() ) || is_paged() && function_exists('yoast_breadcrumb') ) {
  					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  				}
  			?>
    		<?php if ( have_posts() ) : ?>

    			<header class="page-header">
    				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'kicks-app' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h3>
    			</header><!-- .page-header -->

    			<?php
    			// Start the loop.
    			while ( have_posts() ) : the_post();

    				/**
    				 * Run the loop for the search to output the results.
    				 * If you want to overload this in a child theme then include a file
    				 * called content-search.php and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', 'search' );

    			// End the loop.
    			endwhile;

    			// Previous/next page navigation.
    			call_user_func_array(function_exists('wp_bootstrap_posts_pagination') ? 'wp_bootstrap_posts_pagination' : 'the_posts_pagination', array( array(
            'prev_text'          => __( 'Previous page', 'kicks-app' ),
            'next_text'          => __( 'Next page', 'kicks-app' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kicks-app' ) . ' </span>',
          ) ) );

    		// If no content, include the "No posts found" template.
    		else :
    			get_template_part( 'template-parts/content', 'none' );

    		endif;
    		?>
  		</main><!-- .site-main -->
  	</section><!-- .content-area -->
  </div>
  <div class="col-lg-4">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
