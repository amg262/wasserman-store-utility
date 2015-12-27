<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
//Hey there guy.

add_shortcode( 'vulgar', 'wasserman_store_utility_shortcode' );

function wasserman_store_utility_shortcode( $attributes ) {
    $attr = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $attributes );

    return 'Wasserman';
}

