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
  <div class="col-lg-8">
  	<div id="primary" class="content-area">
  		<main id="main" class="site-main py-3" role="main">

  			<section class="error-404 not-found">
  				<header class="page-header">
  					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'kicks-app' ); ?></h1>
  				</header><!-- .page-header -->

  				<div class="page-content">
  					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'kicks-app' ); ?></p>

  					<?php get_search_form(); ?>
  				</div><!-- .page-content -->
  			</section><!-- .error-404 -->

  		</main><!-- .site-main -->
  	</div><!-- .content-area -->
  </div>
  <div class="col-lg-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
