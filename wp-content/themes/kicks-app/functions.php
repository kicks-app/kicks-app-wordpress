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

// Register widget area.
register_sidebar( array(
  'name'          => __( 'Widget Area', 'kicks-app' ),
  'id'            => 'sidebar-1',
  'description'   => __( 'Add widgets here to appear in your sidebar.', 'kicks-app' ),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget'  => '</aside>'
) );

function bootstrap_searchform_options($options) {
  return array_merge($options, array(
    'submit_label' => '<i class="glyphicon glyphicon-search"></i>'
  ));
}
add_filter( 'bootstrap_searchform_options', 'bootstrap_searchform_options' );

// Bootstrap 3
function bootstrap_widgets_options($options) {
  return array_merge($options, array(
    'widget_class' => 'panel',
    'widget_modifier_class' => 'panel-default',
    'widget_header_class' => 'panel-heading'
  ));
}
add_filter( 'bootstrap_widgets_options', 'bootstrap_widgets_options' );

function bootstrap_menu_options($options) {
  return array_merge($options, array(
    'sub_menu_tag' => 'ul',
    'sub_menu_item_tag' => 'li'
  ));
}
add_filter( 'bootstrap_menu_options', 'bootstrap_menu_options' );


// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
  'primary' => __( 'Primary Menu',      'kicks-app' ),
  'secondary' => __( 'Secondary Menu',  'kicks-app' ),
  'social'  => __( 'Social Links Menu', 'kicks-app' ),
) );