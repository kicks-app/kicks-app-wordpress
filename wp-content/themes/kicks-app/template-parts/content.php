<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<?php if (is_single()): ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header m-b-2">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
			<?php endif; ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<?php if (has_post_thumbnail()): ?>
			<div class="figure">
	    	<?php the_post_thumbnail('post-thumbnail', array(
					'class' => 'figure-img img-fluid'
				)); ?>
			</div>
		<?php endif; ?>

		<div class="entry-content">

			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kicks-app' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kicks-app' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php //twentysixteen_entry_meta();
			?>
			<?php
	      // Edit post link
	      call_user_func_array(function_exists('wp_bootstrap_edit_post_link') ? 'wp_bootstrap_edit_post_link' : 'edit_post_link', array(
	        sprintf(
	          /* translators: %s: Name of current post */
	          __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'kicks-app' ),
	          get_the_title()
	        ),
	        '<span class="edit-link">',
	        '</span>'
	      ) );
	    ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php else: ?>
	<?php get_template_part( 'template-parts/card', get_post_type() ); ?>
<?php endif; ?>
