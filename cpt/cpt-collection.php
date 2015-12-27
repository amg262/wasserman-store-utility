<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* Taxonomy for Collection CPT categories
*/
add_action( 'init', 'register_txn_collection' );

function register_txn_collection() {

    $labels = array( 
        'name' => _x( 'Collection', 'collection' ),
        'singular_name' => _x( 'Collection', 'collection' ),
        'search_items' => _x( 'Search Collections', 'collection' ),
        'popular_items' => _x( 'Popular Collections', 'collection' ),
        'all_items' => _x( 'All Collections', 'collection' ),
        'parent_item' => _x( 'Parent Collection', 'collection' ),
        'parent_item_colon' => _x( 'Parent Collection:', 'collection' ),
        'edit_item' => _x( 'Edit Collection', 'collection' ),
        'update_item' => _x( 'Update Collection', 'collection' ),
        'add_new_item' => _x( 'Add New', 'collection' ),
        'new_item_name' => _x( 'New Collection', 'collection' ),
        'separate_items_with_commas' => _x( 'Separate Collections with commas', 'collection' ),
        'add_or_remove_items' => _x( 'Add or remove Collections', 'collection' ),
        'choose_from_most_used' => _x( 'Choose from the most used Collection', 'collection' ),
        'menu_name' => _x( 'Collections', 'collection' ),
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
        'rewrite' => array( 'slug' => 'collection' ),
        'query_var' => true
    );

    register_taxonomy( 'collection', array( 'product' ), $args );
}