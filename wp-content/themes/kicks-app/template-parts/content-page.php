<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

  <footer>
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
  </footer>


</article><!-- #post-## -->
