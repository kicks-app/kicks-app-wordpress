<?php

/** 
 * CUSTOM
 * 
 */

function enqueue_scripts() {
	
	wp_enqueue_script( 'jquery' );
	
	// Enqueue application bundles
 	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/index-bundle.css');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/index-bundle.js', array( 'jquery'));
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Init Bootstrap Hooks
if (function_exists('wp_bootstrap_hooks')) {
	wp_bootstrap_hooks(4);
}

// Include Custom Template Tags
require get_template_directory() . '/inc/remove-admin-bar-css.php';