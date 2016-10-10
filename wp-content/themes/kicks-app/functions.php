<?php

// Include Custom Template Tags
require get_template_directory() . '/inc/remove-admin-bar-css.php';

// Init Bootstrap Hooks
if (function_exists('wp_bootstrap_hooks')) {
  wp_bootstrap_hooks(4);
}

// Enqueue Scripts
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
 	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/index-bundle.css');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/index-bundle.js', array( 'jquery'), false, true);
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

function bootstrap_get_search_form_args($args) {
  return array_merge($args, array(
    'submit_label' => '<i class="fa fa-search"></i>'
  ));
}
add_filter( 'wp_bootstrap_get_search_form_args', 'bootstrap_get_search_form_args' );
