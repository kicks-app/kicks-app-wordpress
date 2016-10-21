<?php

// Make theme available for translation.
load_theme_textdomain( 'kicks-app' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

// Enable support for Post Thumbnails on posts and pages.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 900, 500, true );
  
// Switch default core markup for search form, comment form, and comments to output valid HTML5.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ));

// Let WordPress manage the document title.
add_theme_support( 'title-tag' );

// Adjust default image sizes
update_option( 'thumbnail_size_w', 230 );
update_option( 'thumbnail_size_h', 230 );
update_option( 'thumbnail_crop', 1 );

// Register custom image sizes
add_image_size( 'gallery-zoom', 900, 500, true );

// Enqueue Scripts
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
 	wp_enqueue_style( 'app', get_template_directory_uri() . '/_assets/index.css');
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/_assets/vendor.js', array( 'jquery'), false, true);
  wp_enqueue_script( 'app', get_template_directory_uri() . '/_assets/app.js', array( 'vendor'), false, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Register widget area.
register_sidebar( array(
  'name'          => __( 'Widget Area', 'kicks-app' ),
  'id'            => 'sidebar-1',
  'description'   => __( 'Add widgets here to appear in your sidebar.', 'kicks-app' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget'  => '</aside>'
) );

// Remove admin-bar css
require get_template_directory() . '/inc/remove-admin-bar-css.php';

// Init Bootstrap Hooks
if (function_exists('wp_bootstrap_hooks')) {
  wp_bootstrap_hooks();
}

// Add glyphicon to search-form
function bootstrap_forms_options($options) {
  return array_merge($options, array(
    'search_submit_label' => '<i class="glyphicon glyphicon-search"></i>'
  ));
}
add_filter( 'bootstrap_forms_options', 'bootstrap_forms_options' );

// Use gallery-zoom as image-size for gallery slider
function bootstrap_gallery_options($options) {
  return array_merge($options, array(
    'gallery_large_size' => 'gallery-zoom'
  ));
}
add_filter( 'bootstrap_gallery_options', 'bootstrap_gallery_options' );

// Register menus
register_nav_menus( array(
  'primary' => __( 'Primary Menu',      'kicks-app' ),
  'secondary' => __( 'Secondary Menu',  'kicks-app' ),
  'social'  => __( 'Social Links Menu', 'kicks-app' ),
) );

// Limit archives widget
function limit_archives( $args ) {
    $args['limit'] = 6;
    return $args;
}
add_filter( 'widget_archives_args', 'limit_archives' );