<?php

add_action( 'init', 'create_post_type_job' );
function create_post_type_job() {
  // Register custom post type
  register_post_type( 'job',
    array(
      'labels' => array(
        'name' => __( 'Jobs', 'kicks-app' ),
        'singular_name' => __( 'Job', 'kicks-app' )
      ),
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
      'public' => true,
      'taxonomies' => array('job_tag')
    )
  );

  // Register custom taxonomy
  register_taxonomy( 'job_tag', 'job', array(
    'hierarchical' => false,
    'label' => __('Job Tag'),
    'labels' => array(
      'name' => __( 'Job Tags' ),
      'singular_name' => __( 'Job Tag' )
    ),
    'query_var' => 'job_tag',
    'rewrite' => array('slug' => 'job_tag' )
  ));

  flush_rewrite_rules();
}

// Make jobs default on a custom front-page
add_action('pre_get_posts', function ($wp_query) {
  // Ensure this filter isn't applied to the admin area or sub-queries like menu-items
  if ( ! is_admin() && $wp_query->is_main_query() ) {
    if ($wp_query->get('page_id') === get_option('page_on_front') || is_home() || is_front_page()) {
      $wp_query->set('post_type', 'job');
      $wp_query->set('page_id', ''); // Empty

      // Set properties that describe the page to reflect that
      // We aren't really displaying a static page
      $wp_query->is_page = 0;
      $wp_query->is_singular = 0;
      $wp_query->is_post_type_archive = 1;
      $wp_query->is_archive = 1;
    }
  }
});
?>
