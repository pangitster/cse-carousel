<?php
/*
Plugin Name: Cornerstone Carousel
Plugin URI:  http://www.pangitster.com/downloads/cornerstone-carousel/
Description: This is a carousel extension element for Cornerstone plugin.
Version:     0.21
Author:      PangitSter
Author URI:  http://www.pangitster.com
Author Email: pangitster@gmail.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//
// Enqueue Scripts
// =============================================================================
function cse_carousel_scripts() {
	//wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'cse-carousel', plugins_url( '/assets/js/cse-carousel-min.js', __FILE__ ), array( 'jquery' ), null, true );
	
	//wp_enqueue_style( 'cse-carousel', plugins_url( '/assets/css/cse-carousel.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.css' );
	// Add the slick-theme.css if you want default styling
	wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/jquery.slick/1.5.8/slick-theme.css' );
}
add_action( 'wp_enqueue_scripts', 'cse_carousel_scripts', 100 );

//
// Slick Attribute Generator
// =============================================================================

function cse_slick_params( $params = array() ) {

  $data = '';

  if ( ! empty( $params ) ) {
    $params_json = json_encode( $params );
    $data .= " data-slick='" . $params_json ."'";
  }

  return $data;

}


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('shortcodes/shortcodes.php');

/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function cse_carousel_elements() {
	require_once( 'elements/carousel-element.php' );
	require_once( 'elements/carousel-element-item.php' );
  cornerstone_add_element( 'CSE_Carousel' );
  cornerstone_add_element( 'CSE_Carousel_Item' );
}
add_action( 'cornerstone_load_elements', 'cse_carousel_elements' );
