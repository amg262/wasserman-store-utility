<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/*
* Custom Post Type for Testimonial
*/
add_action( 'init', 'register_cpt_testimonial' );

function register_cpt_testimonial() {

    $labels = array( 
        'name' => _x( 'Testimonial', 'testimonial' ),
        'singular_name' => _x( 'Testimonial', 'testimonial' ),
        'add_new' => _x( 'Add New', 'testimonial' ),
        'add_new_item' => _x( 'Add New Testimonial', 'testimonial' ),
        'edit_item' => _x( 'Edit Testimonial', 'testimonial' ),
        'new_item' => _x( 'New Testimonial', 'testimonial' ),
        'view_item' => _x( 'View Testimonials', 'testimonial' ),
        'all_items' => _x( 'All Testimonials', 'testimonial' ),
        'search_items' => _x( 'Search Testimonials', 'testimonial' ),
        'not_found' => _x( 'No Testimonials found', 'testimonial' ),
        'not_found_in_trash' => _x( 'No Testimonials found in Trash', 'testimonial' ),
        'parent_item_colon' => _x( 'Parent Testimonials:', 'testimonial' ),
        'menu_name' => _x( 'Testimonials', 'testimonial' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ), // 'custom-fields' , 'excerpt' 
        'taxonomies' => array( 'post_tag', 'testimonials'), //, 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-format-quote',//'dashicons-controls-volumeon', //'dashicons-media-audio',
        'has_archive' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'testimonial' ),
        'capability_type' => 'post'
    );

    register_post_type( 'testimonial', $args );
}


/**
* Taxonomy for Testimonial CPT categories
*/
add_action( 'init', 'register_txn_testimonial' );

function register_txn_testimonial() {

    $labels = array( 
        'name' => _x( 'Testimonial Category', 'testimonials' ),
        'singular_name' => _x( 'Testimonial Category', 'testimonials' ),
        'search_items' => _x( 'Search Testimonial Categories', 'testimonials' ),
        'popular_items' => _x( 'Popular Testimonial Categories', 'testimonials' ),
        'all_items' => _x( 'All Testimonial Categories', 'testimonials' ),
        'parent_item' => _x( 'Parent Testimonial Category', 'testimonials' ),
        'parent_item_colon' => _x( 'Parent Testimonial Category:', 'testimonials' ),
        'edit_item' => _x( 'Edit Testimonial Category', 'testimonials' ),
        'update_item' => _x( 'Update Testimonial Category', 'testimonials' ),
        'add_new_item' => _x( 'Add New', 'testimonials' ),
        'new_item_name' => _x( 'New Testimonial Category', 'testimonials' ),
        'separate_items_with_commas' => _x( 'Separate Testimonial Categories with commas', 'testimonials' ),
        'add_or_remove_items' => _x( 'Add or remove Testimonial Categories', 'testimonials' ),
        'choose_from_most_used' => _x( 'Choose from the most used Testimonial Category', 'testimonials' ),
        'menu_name' => _x( 'Categories', 'testimonials' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'testimonial-category' ),
        'query_var' => true
    );

    register_taxonomy( 'testimonials', array('testimonial'), $args );
}

