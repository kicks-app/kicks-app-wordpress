<?php

// Include Custom Template Tags
require get_template_directory() . '/inc/remove-admin-bar-css.php';

// Init Bootstrap Hooks
if (function_exists('wp_bootstrap_hooks')) {
  wp_bootstrap_hooks();
}

// Enqueue Scripts
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
 	wp_enqueue_style( 'app', get_template_directory_uri() . '/_assets/index.css');
	
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/_assets/vendor.js', array( 'jquery'), false, true);
  wp_enqueue_script( 'app', get_template_directory_uri() . '/_assets/app.js', array( 'vendor'), false, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Register custom image sizes
add_image_size( 'gallery-zoom', 900, 500, true );

// Register widget area.
register_sidebar( array(
  'name'          => __( 'Widget Area', 'kicks-app' ),
  'id'            => 'sidebar-1',
  'description'   => __( 'Add widgets here to appear in your sidebar.', 'kicks-app' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget'  => '</aside>'
) );

function bootstrap_forms_options($options) {
  return array_merge($options, array(
    'search_submit_label' => '<i class="glyphicon glyphicon-search"></i>'
  ));
}
add_filter( 'bootstrap_forms_options', 'bootstrap_forms_options' );

function bootstrap_gallery_options($options) {
  return array_merge($options, array(
    'gallery_large_size' => 'gallery-zoom'
  ));
}
add_filter( 'bootstrap_gallery_options', 'bootstrap_gallery_options' );

// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
  'primary' => __( 'Primary Menu',      'kicks-app' ),
  'secondary' => __( 'Secondary Menu',  'kicks-app' ),
  'social'  => __( 'Social Links Menu', 'kicks-app' ),
) );