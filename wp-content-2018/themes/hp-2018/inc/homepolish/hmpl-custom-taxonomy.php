<?php

// register new taxonomies
/* Plugin Name: Location Taxonomy */
if ( ! function_exists( 'slug_locations_tax' ) ) {
  // Register Custom Taxonomy
  function slug_locations_tax() {
    $labels = array(
    'name'                        => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'               => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                   => __( 'Location', 'text_domain' ),
    'all_Locations'                   => __( 'All Locations', 'text_domain' ),
    'parent_Location'                 => __( 'Parent Location', 'text_domain' ),
    'parent_Location_colon'           => __( 'Parent Location:', 'text_domain' ),
    'new_Location_name'               => __( 'New Location name', 'text_domain' ),
    'add_new_Location'                => __( 'Add new Location', 'text_domain' ),
    'edit_Location'                   => __( 'Edit Location', 'text_domain' ),
    'update_Location'                 => __( 'Update Location', 'text_domain' ),
    'separate_Locations_with_commas'  => __( 'Separate Locations with commas', 'text_domain' ),
    'search_Locations'                => __( 'Search Locations', 'text_domain' ),
    'add_or_remove_Locations'         => __( 'Add or remove Locations', 'text_domain' ),
    'choose_from_most_used'         => __( 'Choose from the most used Locations', 'text_domain' ),
    'not_found'                     => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
      'rewrite' => array(
          'slug'          => 'location',
          'with_front'    => true
      )
    );
    register_taxonomy( 'location', array( 'post' ), $args );
  }

  // Hook into the 'init' action
  add_action( 'init', 'slug_locations_tax', 0 );
}

function wptp_add_designer_taxonomy() {
  $labels = array(
      'name'              => 'Designers',
      'singular_name'     => 'Designer',
      'search_items'      => 'Search Designers',
      'all_items'         => 'All Designers',
      'parent_item'       => 'Parent Designer',
      'parent_item_colon' => 'Parent Designer:',
      'edit_item'         => 'Edit Designer',
      'update_item'       => 'Update Designer',
      'add_new_item'      => 'Add New Designer',
      'new_item_name'     => 'New Designer Name',
      'menu_name'         => 'Designer',
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'query_var' => 'designer',
      'rewrite' => 'true',
      'show_admin_column' => 'true',
  );

  register_taxonomy( 'designer', 'post', $args );
}
add_action( 'init', 'wptp_add_designer_taxonomy' );

function wptp_add_vibe_taxonomy() {
  $labels = array(
      'name'              => 'Vibes',
      'singular_name'     => 'Vibe',
      'search_items'      => 'Search Vibes',
      'all_items'         => 'All Vibes',
      'parent_item'       => 'Parent Vibe',
      'parent_item_colon' => 'Parent Vibe:',
      'edit_item'         => 'Edit Vibe',
      'update_item'       => 'Update Vibe',
      'add_new_item'      => 'Add New Vibe',
      'new_item_name'     => 'New Vibe Name',
      'menu_name'         => 'Vibe',
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'query_var' => 'vibe',
      'rewrite' => 'true',
      'show_admin_column' => 'true',
  );

  register_taxonomy( 'vibe', array( 'attachment', 'post' ), $args );
}
add_action( 'init', 'wptp_add_vibe_taxonomy' );

function wptp_add_room_taxonomy() {
  $labels = array(
      'name'              => 'Rooms',
      'singular_name'     => 'Room',
      'search_items'      => 'Search Rooms',
      'all_items'         => 'All Rooms',
      'parent_item'       => 'Parent Room',
      'parent_item_colon' => 'Parent Room:',
      'edit_item'         => 'Edit Room',
      'update_item'       => 'Update Room',
      'add_new_item'      => 'Add New Room',
      'new_item_name'     => 'New Room Name',
      'menu_name'         => 'Room',
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'query_var' => 'room',
      'rewrite' => 'true',
      'show_admin_column' => 'true',
  );

	register_taxonomy( 'room', array( 'attachment', 'post' ), $args );
}
add_action( 'init', 'wptp_add_room_taxonomy' );

function wptp_add_product_taxonomy() {
  $labels = array(
      'name'              => 'Products',
      'singular_name'     => 'Product',
      'search_items'      => 'Search Products',
      'all_items'         => 'All Products',
      'parent_item'       => 'Parent Product',
      'parent_item_colon' => 'Parent Product:',
      'edit_item'         => 'Edit Product',
      'update_item'       => 'Update Product',
      'add_new_item'      => 'Add New Product',
      'new_item_name'     => 'New Product Name',
      'menu_name'         => 'Product',
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'query_var' => 'product',
      'rewrite' => 'true',
      'show_admin_column' => 'true',
  );
	

  register_taxonomy( 'product', array( 'attachment', 'post' ), $args );
}
add_action( 'init', 'wptp_add_product_taxonomy' );

?>