<?php

// Import post types
require_once 'post-types/job.php';

// Make theme available for translation.
load_theme_textdomain( 'kicks-app' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

// Add header image support
add_theme_support('custom-header', array(
	'width'         => 1680,
	'height'        => 600,
	'default-image' => get_template_directory_uri() . '/img/header-image.jpg'
));

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

// Enqueue Scripts
function enqueue_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_style( 'main', get_template_directory_uri() . '/dist/main.css');
  wp_enqueue_script( 'vendor', get_template_directory_uri() . '/dist/vendor.js', array( 'jquery'));
  wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/main.js', array( 'vendor'));
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Initialize scripts once only
function turbolinks_attributes( $url ) {
  $defer = '/main/';
  $defer_match = preg_match($defer, $url);

  $ignore = '/mmr|vendor|main/';
  $ignore_match = preg_match($ignore, $url);

  if ($defer_match && $ignore_match) {
    $url = "$url' defer";
    $url = "$url data-turbolinks-eval='false";
  } else if ($ignore_match) {
    $url = "$url' data-turbolinks-eval='false";
  } else if ($defer_match) {
    $url = "$url' defer";
  }
  return $url;
}
add_filter( 'clean_url', 'turbolinks_attributes', 1, 1 );

// Register widget area.
register_sidebar( array(
  'name'          => __( 'Widget Area', 'kicks-app' ),
  'id'            => 'sidebar-1',
  'description'   => __( 'Add widgets here to appear in your sidebar.', 'kicks-app' )
) );

// Register menus
register_nav_menus( array(
  'primary' => __( 'Primary Menu',      'kicks-app' ),
  'secondary' => __( 'Secondary Menu',  'kicks-app' ),
  'social'  => __( 'Social Links Menu', 'kicks-app' )
) );

// Limit archives widget
function limit_archives( $args ) {
    $args['limit'] = 6;
    return $args;
}
add_filter( 'widget_archives_args', 'limit_archives' );

// Excerpt length
define ("EXCERPT_LENGTH", 19);

// Limit custom excerpt length
function custom_excerpt_length( $length ) {
  return EXCERPT_LENGTH;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Override the excerpt "Read More"
function new_excerpt_more($more = null) {
  global $post;

	// $msgid = $post->post_type === 'job' ? 'Apply' : 'Read more';
	$msgid = 'Bewerben';
  return '...<div class="card-footer mt-auto"><a class="readmore btn btn-primary" href="'. get_permalink($post->ID) . '">' . __($msgid, 'kicks-app') . '</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Changing manual excerpt length
add_filter('get_the_excerpt', 'manual_excerpt_length', 20);

function manual_excerpt_length($excerpt) {
  global $post;

  if ($post->post_excerpt) {
    $post_excerpt = trim(strip_tags($post->post_excerpt));
    $excerpt = wp_trim_words( $post_excerpt, EXCERPT_LENGTH, '' );
    if (strlen($post_excerpt) > strlen($excerpt)) {
      $excerpt.= new_excerpt_more();
    }
  }
  return $excerpt;
}

// Setup bootstrap-hooks
if (function_exists('wp_bootstrap_hooks')) {
  wp_bootstrap_hooks();
}

// Show font-awesome search icon in searchform
add_filter( 'bootstrap_options', function($options) {
  return array_merge($options, array(
    'search_submit_label' => '<i class="fa fa-search"></i>',
		'post_tag_class' => 'badge badge-primary text-light mb-1'
  ));
} );

// Make social-menu-icons render font-awesome
add_filter( 'wp_nav_menu_args', function($args) {
  $args['social_icon_prefix'] = 'fab fa-';
  return $args;
}, 1, 2 );

// Setup Basic Contact Form
function custom_shortcode_atts_basic_contact_form($out, $pairs, $atts, $shortcode) {
  $result = array_merge($out, array(
    'form_template' => get_template_directory() . '/contactform.php'
  ), $atts);
  return $result;
}
add_filter( 'shortcode_atts_basic-contact-form', 'custom_shortcode_atts_basic_contact_form', 10, 4);
