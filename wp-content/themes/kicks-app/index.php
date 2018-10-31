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

$sticky_post = null;
$sticky = get_option( 'sticky_posts' );
$args = array(
	'posts_per_page' => 1,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1
);
$query = new WP_Query( $args );
if ( isset($sticky[0]) ) {
	// insert here your stuff...
	$sticky_post = $sticky[0];
}

get_header(); ?>
<div class="row">
	<div class="col-lg-12 mb-4">
		<div id="primary" class="content-area">
			<?php
				if ( !(is_front_page() || is_home() ) || is_paged() && function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
			<main id="main" class="site-main my-3" role="main">
				<?php if (( is_front_page() || is_home()) && !is_paged()): ?>
					<div class="site-intro mb-3 pb-1">
						<small class="d-none"><?php bloginfo( 'description' ); ?></small>
						<p class="lead">
							Auf top-tipp-job-de findest Du Deinen nächsten Neben- oder Gelegenheitsjob.
						</p>
						<?php if ($sticky_post): ?>
							<div class="card card-job border p-4 w-50">
								<div class="card-body">
									<h4>z.B. <?= get_the_title($sticky_post); ?></h4>
									<div class="card-text"><?= get_the_excerpt($sticky_post); ?></div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php if (have_posts()): ?>
					<section class="mb-4">
						<h2 class="mb-3">Unsere Jobangebote</h2>
						<div class="row">
							<?php while ( have_posts() ) : the_post() // Start the Loop. ?>
								<div class="col-md-6 col-lg-4">
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
					<div>
				<?php endif; ?>
				<div class="text-center pb-2">
					<!-- btn btn-sm btn-outline-secondary -->
					<a class="lead btn btn-outline-primary btn-lg" href="<?php echo get_post_type_archive_link( 'job' ); ?>">
						<i class="fas fa-hand-point-right"></i>&nbsp;Alle Jobs anzeigen
					</a>
				</div>
			</section>

				<?php if (( is_front_page() || is_home()) && !is_paged()): ?>
					<!-- <div class="site-intro mb-3 pb-1">
						<hr/>
						<small class="d-none"><?php bloginfo( 'description' ); ?></small>
						<h2 class="h2 mb-1">Jetzt durchstarten!</h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>

						<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

						<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>

						<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

						<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>

						<p>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>

						<p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>

						<p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</p>

						<p>Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>

						<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>

						<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.</p>

						<p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
					</div> -->
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
	<div class="col-lg-12 mb-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
