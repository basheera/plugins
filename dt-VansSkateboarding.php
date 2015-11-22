<?php
/*
Plugin Name:  Vans Skateboarding Post Type Plugin
*/

function vansSkateboarding_setup_post_types() {
 
    // Register our "book" custom post type
    register_post_type( 'Vans Skateboarding', 
      array(
        'labels' => array(
          'name' => __('Vans Skateboarding'),
          'singular_name' => __('Vans Skateboarding')
          ),
       'public' => true,
       'has_archive' => true
      ) 
    );
 
}
// make sure the second argument of this function matches the name of the method above
add_action( 'init', 'vansSkateboarding_setup_post_types ' );


// ==================================================================
 

// this will fix any permalink issues that might reult from adding the post type
function vansSkateboarding_install() {
 
    // Trigger our function that registers the custom post type
    vansSkateboarding_setup_post_types();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
 
}
register_activation_hook( __FILE__, 'vansSkateboarding_install' );


// ==================================================================


// Show posts of 'post', 'page' and 'portfolio_item' post types on home page
// add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

// function add_my_post_types_to_query( $query ) {
//   if ( is_home() && $query->is_main_query() )
//     $query->set( 'post_type', array( 'post', 'page', 'portfolio_item' ) );
//   return $query;
// }