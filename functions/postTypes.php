<?php

function buildConfig($slug, $singular, $plural) {
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'revisions'
  );

  $labels = array(
    'name'                  => _x( $plural, 'Post type general name', 'dyr' ),
    'singular_name'         => _x( $singular, 'Post type singular name', 'dyr' ),
    'menu_name'             => _x( $singular, 'Admin Menu text', 'dyr' ),
    'name_admin_bar'        => _x( $singular, 'Add New on Toolbar', 'dyr' ),
    'add_new'               => __( 'Add New', 'dyr' ),
    'add_new_item'          => __( 'Add New', 'dyr' ),
    'new_item'              => __( 'New', 'dyr' ),
    'edit_item'             => __( 'Edit', 'dyr' ),
    'view_item'             => __( 'View', 'dyr' ),
    'all_items'             => __( $plural, 'dyr' ),
    'search_items'          => __( 'Search', 'dyr' ),
    'parent_item_colon'     => __( 'Parent:', 'dyr' ),
    'not_found'             => __( 'Nothing found.', 'dyr' ),
    'not_found_in_trash'    => __( 'Nothing found in Trash.', 'dyr' ),
    'featured_image'        => _x( 'Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'dyr' ),
    'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'dyr' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'dyr' ),
    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'dyr' ),
    'archives'              => _x( 'archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'dyr' ),
    'insert_into_item'      => _x( 'Insert into', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'dyr' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'dyr' ),
    'filter_items_list'     => _x( 'Filter', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'dyr' ),
    'items_list_navigation' => _x( 'List navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'dyr' ),
    'items_list'            => _x( 'List', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'dyr' ),
  );

  return array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => $slug),
    'has_archive' => true,
    'hierarchical' => false,
  );
}

function datosCustomPostTypes() {
  //register_post_type('mapa', buildConfig('mapa', 'Mapa', 'Puntos'));
}

add_action('init', 'datosCustomPostTypes');