<?php
/*
Plugin Name: Cornerstone: Carousel
Plugin URI:  http://
Description: This is a carousel extension element for Cornerstone plugin.
Version:     0.1
Author:      Lenoriquep
Author URI:  http://
Author Email: len@len.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/
function cs_carousel_scripts() {
	wp_enqueue_script( 'cs-carousel', plugins_url( '/assets/js/custom.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_style( 'cs-carousel', plugins_url( '/assets/css/custom.css', __FILE__ ), array(), '1.0' );
}
//add_action( 'wp_enqueue_scripts', 'cs_carousel_scripts', 100 );


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('shortcodes/shortcodes.php');

/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function cs_carousel_elements() {
	require_once( 'elements/carousel-element.php' );
	require_once( 'elements/carousel-element-item.php' );
  cornerstone_add_element( 'CS_Carousel' );
  cornerstone_add_element( 'CS_Carousel_Item' );
}
add_action( 'cornerstone_load_elements', 'cs_carousel_elements' );
