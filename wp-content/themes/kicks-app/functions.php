<?php

/** 
 * CUSTOM
 * 
 */

function enqueue_scripts() {
	
	wp_enqueue_script( 'jquery' );
	
	// FIXME: Bootstrap requires tether as global, so we're not bundling it
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/_assets/js/tether.min.js');
	
	// Enqueue application bundles
 	wp_enqueue_style( 'main', get_template_directory_uri() . '/_assets/css/main.css');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/_assets/js/main.js', array( 'jquery', 'tether' ));
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Init Bootstrap Hooks
if (function_exists('wp_bootstrap_hooks')) {
	wp_bootstrap_hooks(4);
}

// Include Custom Template Tags
require get_template_directory() . '/inc/remove-admin-bar-css.php';