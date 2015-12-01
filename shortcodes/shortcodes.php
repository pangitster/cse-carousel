<?php

// Carousel
// =============================================================================

function cse_shortcode_carousel( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => '',
    'slidesToShow'  => '',
    'slidesToScroll'=> '',
    'slide_speed'   => '',
    'slideshow'     => '',
    'random'        => '',
    'control_nav'   => '',
    'prev_next_nav' => '',
    'no_container'  => '',
    'touch'         => ''
  ), $atts, 'cse_carousel' ) );

  static $count = 0; $count++;

  $id            = ( $id            != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class         != ''     ) ? "cse-carousel-shortcode-container " . esc_attr( $class ) : "cse-carousel-shortcode-container";
  $style         = ( $style         != ''     ) ? 'style="' . $style . '"' : '';
  $no_container  = ( $no_container  == 'true' ) ? '' : ' with-container';

  $js_params = array(
    //'slide'          => '.cse-carousel-item',
    //'variableWidth'   => true,
    'slidesToShow'   => ( $slidesToShow     != ''  ) ? $slidesToShow    : 4,
    'slidesToScroll' => ( $slidesToScroll   != ''  ) ? $slidesToScroll  : 4,
  );

  $data = cse_slick_params( $js_params );

  $output = "<div class=\"{$class}{$no_container}\">"
            . "<div {$id} class=\" cse-carousel-shortcode cse-carousel-shortcode-{$count}\" {$style}>"
              . "<div class=\"cse-carousel unstyled data\" {$data}>"
                . do_shortcode( $content )
              . '</div>'
            . '</div>'
          . '</div>';

  return $output;
}

add_shortcode( 'cse_carousel', 'cse_shortcode_carousel' );



// Carousel Item
// =============================================================================

function cse_shortcode_carousel_item( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts, 'cse_carousel_item' ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'cse-carousel-item ' . esc_attr( $class ) : 'cse-carousel-item';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div>";

  return $output;
}

add_shortcode( 'cse_carousel_item', 'cse_shortcode_carousel_item' );