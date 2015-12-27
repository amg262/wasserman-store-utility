<?php // Get out!
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();



function delete_wsu_cpts() {


	$args = array(
		'numberposts' => -1,
		'post_type' => 'collection'
	);

	$posts = get_posts( $args );

	if (is_array($posts)) {

	   foreach ($posts as $post) {

	       wp_delete_post( $post->ID, true);
	       echo "Deleted Post: ".$post->title."\r\n";
	   }
	}

	$args = array(
		'numberposts' => -1,
		'post_type' => 'testimonial'
	);

	$posts = get_posts( $args );

	if (is_array($posts)) {

	   foreach ($posts as $post) {

	       wp_delete_post( $post->ID, true);
	       echo "Deleted Post: ".$post->title."\r\n";
	   }

	}

}



delete_wsu_cpts();
/*
* Getting options groups
*/
//$option_1 = 'outofstock_settings_option';
//$option_3 = 'outofstock_image_url';

/*
* Delete options
*/
//delete_option( $option_1 );
//delete_option( $option_3 );

/*
* For site options in multisite
*/
//delete_site_option( $option_1 );   
//delete_site_option( $option_3 );  
 
//drop a custom db table
//global $wpdb;
//$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );

//note in multisite looping through blogs to delete options on each blog does not scale. You'll just have to leave them.