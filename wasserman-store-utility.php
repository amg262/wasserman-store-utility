<?php
/*
* Plugin Name: Wasserman Store Utility
* Plugin URI: http://andrewgunn.xyz/wasserman-store-utility
* Description: Plugin with special utilities for Wasserman Store theme
* Version: 1.0.0
* Author: Andrew Gunn
* Author URI: http://andrewgunn.xyz
* Text Domain: wasserman-store-utility
* License: GPL2
*/
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

//include_once('admin/class-wsu-settings.php');

//include_once('cpt/cpt-testimonial.php');
include_once('cpt/cpt-collection.php');

include_once('inc/shortcode.php');
include_once('inc/script-styles.php');

/**
* Register and enqueue jQuery files to run on frontend, enqueue on admin_init
*/
add_action( 'init', 'register_wsu_scripts' );

function register_wsu_scripts() {
	wp_register_script( 'wsu_js', plugins_url('inc/wasserman.js', __FILE__), array('jquery') );
	wp_register_style( 'wsu_css', plugins_url('inc/wasserman.css', __FILE__));
	wp_enqueue_script( 'wsu_js' );
	wp_enqueue_style( 'wsu_css' );
}
add_action( 'wp_enqueue_scripts', 'register_flexslider_scripts' );

function register_flexslider_scripts() {
  wp_register_script( 'flex_js', plugins_url('inc/jquery.flexslider.js', __FILE__), array('jquery') );
  //wp_register_script( 'flex_min_js', plugins_url('inc/jquery.flexslider-min.js', __FILE__), array('jquery') );
  wp_register_style( 'flex_css', plugins_url('inc/flexslider.css', __FILE__));
  wp_enqueue_script( 'flex_js' );
  //wp_enqueue_script( 'flex_min_js' );
  wp_enqueue_style( 'flex_css' );
}

add_action( 'woocommerce_before_checkout_form', 'wsu_add_checkout_content', 12 );
function wsu_add_checkout_content() {
	echo '<div class="woocommerce-info"><strong>Note: </strong>Placing an order means you conform to our'.
	' <a target="_blank" href="/shipping-policy">Shipping Policy</a>. All orders placed after 4:00 PM CDT <b>will not</b>'.
	' be processed until the following business day. Sales tax applies to Wisconsin orders.</div>';
}
/**
* Adding new images sizes
*/
add_action( 'admin_init', 'generate_wsu_image_sizes' );

function generate_wsu_image_sizes() {
	add_image_size( 'flexslider', 200, 300);
}

/**
 * Only display minimum price for WooCommerce variable products
 **/
add_filter('woocommerce_variable_price_html', 'display_lowest_range_prie', 10, 2);

function display_lowest_range_prie( $price, $product ) {

     $price = '';


     $price .= woocommerce_price($product->get_price());

     return $price;
}

// remove cross-sells from their normal place

//add_filter( 'plugin_action_links', 'wsu_plugin_links', 10, 5 );

function wsu_plugin_links( $actions, $plugin_file )
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);

		if ($plugin == $plugin_file) {

			$settings = array(
							  //'stories' => '<a href="edit.php?post_type=trail-story">' . __('Stories', 'General') . '</a>',
							  //'conditions' => '<a href="edit.php?post_type=trail-condition">' . __('Conditions', 'General') . '</a>',
							  //'itineraries' => '<a href="edit.php?post_type=itinerary">' . __('Itineraries', 'General') . '</a>',
							  'settings' => '<a href="admin.php?page=geo-trail-map">' . __('Settings', 'General') . '</a>'
							  );

    			$actions = array_merge($settings, $actions);
		}

		return $actions;
}