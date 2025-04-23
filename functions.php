<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_and_child_styles' );
function enqueue_parent_and_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}

function create_custom_post_type_projects() {
    register_post_type('projects',
      array(
        'labels' => array(
          'name' => __('Projects'),
          'singular_name' => __('Project')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projects'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-portfolio', // optional: nice icon in dashboard
      )
    );
  }
  add_action('init', 'create_custom_post_type_projects');
  