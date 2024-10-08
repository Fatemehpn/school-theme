<?php
function kf_register_custom_post_types() {
    
  // Register Student for each custom post type
  $labels = array(
      'name'                  => _x( 'Students', 'post type general name' ),
      'singular_name'         => _x( 'Student', 'post type singular name'),
      'menu_name'             => _x( 'Students', 'admin menu' ),
      'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
      'add_new'               => _x( 'Add New', 'student' ),
      'add_new_item'          => __( 'Add New Student' ),
      'new_item'              => __( 'New Student' ),
      'edit_item'             => __( 'Edit Student' ),
      'view_item'             => __( 'View Student' ),
      'all_items'             => __( 'All Students' ),
      'search_items'          => __( 'Search Students' ),
      'parent_item_colon'     => __( 'Parent Students:' ),
      'not_found'             => __( 'No students found.' ),
      'not_found_in_trash'    => __( 'No students found in Trash.' ),
      'archives'              => __( 'Student Archives'),
      'insert_into_item'      => __( 'Insert into student'),
      'uploaded_to_this_item' => __( 'Uploaded to this student'),
      'filter_item_list'      => __( 'Filter students list'),
      'items_list_navigation' => __( 'Students list navigation'),
      'items_list'            => __( 'Students list'),
      'featured_image'        => __( 'Student featured image'),
      'set_featured_image'    => __( 'Set student featured image'),
      'remove_featured_image' => __( 'Remove student featured image'),
      'use_featured_image'    => __( 'Use as featured image'),
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'students' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-archive',
      'supports'           => array( 'title', 'thumbnail', 'editor' ),
      'template'           => array( array( 'core/paragraph'), array('core/button') ),
      'template_lock'      => 'all'
  );

  register_post_type( 'kf-student', $args );
  


  // Register Staff for each custom post type
  $labels = array(
    'name'                  => _x( 'Staffs', 'post type general name' ),
    'singular_name'         => _x( 'Staff', 'post type singular name'),
    'menu_name'             => _x( 'Staffs', 'admin menu' ),
    'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
    'add_new'               => _x( 'Add New', 'Staff' ),
    'add_new_item'          => __( 'Add New Staff' ),
    'new_item'              => __( 'New Staff' ),
    'edit_item'             => __( 'Edit Staff' ),
    'view_item'             => __( 'View Staff' ),
    'all_items'             => __( 'All Staffs' ),
    'search_items'          => __( 'Search Staffs' ),
    'parent_item_colon'     => __( 'Parent Staffs:' ),
    'not_found'             => __( 'No Staffs found.' ),
    'not_found_in_trash'    => __( 'No Staffs found in Trash.' ),
    'archives'              => __( 'Staff Archives'),
    'insert_into_item'      => __( 'Insert into Staff'),
    'uploaded_to_this_item' => __( 'Uploaded to this Staff'),
    'filter_item_list'      => __( 'Filter Staffs list'),
    'items_list_navigation' => __( 'Staffs list navigation'),
    'items_list'            => __( 'Staffs list'),
    'featured_image'        => __( 'Staff featured image'),
    'set_featured_image'    => __( 'Set Staff featured image'),
    'remove_featured_image' => __( 'Remove Staff featured image'),
    'use_featured_image'    => __( 'Use as featured image'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'staffs' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-archive',
    'supports'           => array( 'title' ),
);

register_post_type( 'kf-staff', $args );
}
add_action( 'init', 'kf_register_custom_post_types' );

// register the custom taxanomies
function kf_register_taxonomies() {
  // Add Student Category taxonomy
  $labels = array(
      'name'              => _x( 'Student Types', 'taxonomy general name' ),
      'singular_name'     => _x( 'Student Type', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Student Types' ),
      'all_items'         => __( 'All Student Type' ),
      'parent_item'       => __( 'Parent Student Type' ),
      'parent_item_colon' => __( 'Parent Student Type:' ),
      'edit_item'         => __( 'Edit Student Type' ),
      'view_item'         => __( 'View Student Type' ),
      'update_item'       => __( 'Update Student Type' ),
      'add_new_item'      => __( 'Add New Student Type' ),
      'new_item_name'     => __( 'New Student Type Name' ),
      'menu_name'         => __( 'Student Type' ),
  );
  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_in_menu'      => true,
      'show_in_nav_menu'  => true,
      'show_in_rest'      => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'student-types' ),
  );
  register_taxonomy( 'kf-student-type', array( 'kf-student' ), $args );

    // Add Staff Category taxonomy
    $labels = array(
      'name'              => _x( 'Staff Types', 'taxonomy general name' ),
      'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Staff Types' ),
      'all_items'         => __( 'All Staff Type' ),
      'parent_item'       => __( 'Parent Staff Type' ),
      'parent_item_colon' => __( 'Parent Staff Type:' ),
      'edit_item'         => __( 'Edit Staff Type' ),
      'view_item'         => __( 'View Staff Type' ),
      'update_item'       => __( 'Update Staff Type' ),
      'add_new_item'      => __( 'Add New Staff Type' ),
      'new_item_name'     => __( 'New Staff Type Name' ),
      'menu_name'         => __( 'Staff Type' ),
  );
  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_in_menu'      => true,
      'show_in_nav_menu'  => true,
      'show_in_rest'      => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'staff-types' ),
  );
  register_taxonomy( 'kf-staff-type', array( 'kf-staff' ), $args );
}
add_action( 'init', 'kf_register_taxonomies');

// when switching themes, this flushes the permalinks, also it's equivalent of going to settings->permalinks->save changes
function kf_rewrite_flush() {
  kf_register_custom_post_types();
  kf_register_taxonomies();
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'kf_rewrite_flush' );