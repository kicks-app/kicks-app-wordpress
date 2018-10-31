<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

 $is_sidebar_layout = !is_archive() || is_search();
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area<?= $is_sidebar_layout ? ' sticky-sidebar' : ''; ?>" role="complementary">
		<div class="sidebar-inner pt-3">
			<div class="sidebar-content<?= $is_sidebar_layout ? ' card-columns-sidebar' : ' card-columns'; ?>">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		</div>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
