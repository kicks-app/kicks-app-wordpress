<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="row">
  <div class="col-md-8">
  	<div id="primary" class="content-area">
  		<main id="main" class="site-main" role="main">
  
  			<section class="error-404 not-found">
  				<header class="page-header">
  					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
  				</header><!-- .page-header -->
  
  				<div class="page-content">
  					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
  
  					<?php get_search_form(); ?>
  				</div><!-- .page-content -->
  			</section><!-- .error-404 -->
  
  		</main><!-- .site-main -->
  	</div><!-- .content-area -->
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
