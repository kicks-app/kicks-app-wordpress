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
	<header class="entry-header m-b-1">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  		<?php if (has_excerpt()): ?>
      <p class="entry-summary lead">
        <?php the_excerpt(); ?>
      </p>
    <?php endif; ?>
  
    <?php the_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //twentysixteen_entry_meta(); 
		?>
		<div class="btn-group">
		<?php
		  $edit_post_link_args = array(
        sprintf(
          /* translators: %s: Name of current post */
          __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
      $edit_post_link_method = function_exists('wp_bootstrap_edit_post_link') ? 'wp_bootstrap_edit_post_link' : 'edit_post_link';
      call_user_func_array($edit_post_link_method, $edit_post_link_args);
		?>  
    </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
