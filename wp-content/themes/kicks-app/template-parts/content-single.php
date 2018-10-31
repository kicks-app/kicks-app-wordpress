<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-4">
		<?php if (has_post_thumbnail()): ?>
			<div class="figure mb-1">
	    	<?php the_post_thumbnail('post-thumbnail', array(
					'class' => 'figure-img img-fluid rounded border'
				)); ?>
			</div>
		<?php endif; ?>
		<h1 class="entry-title mb-1">
			<?= get_the_title(); ?>
		</h1>
		<?php
			$tags = get_terms('job_tag');
			if ( $tags ) : ?>
				<div class="tags mb-3">
				 <?php foreach ( $tags as $tag ) : ?>
					 <a class="badge badge-primary" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>">
						 <?php echo esc_html( $tag->name ); ?>
					 </a>
				 <?php endforeach; ?>
				</div>
			<?php endif;
		?>
		<?php if (has_excerpt()): ?>
			<p class="entry-summary lead">
				<?php the_excerpt(); ?>
			</p>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kicks-app' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kicks-app' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
		<?= do_shortcode('[basic-contact-form title="Jetzt bewerben!" description="Fülle das Formular aus, um mit dem Anbieter in Kontakt zu treten"]'); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //kicks-app_entry_meta();
		?>
		<div class="btn-group">
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
    </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
