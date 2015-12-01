<?php
/**
 *
 * To discover more fields you can use, see examples from current Cornerstone elements! Here's where you'll find them:
 * In the Cornerstone plugin, look in /includes/modules/elements/ and /includes/modules/shortcodes
 *
 * You can find the function reference and inline documentation in this file (of the Cornerstone Plugin):
 *   -------------------------------------------
 *  |   /cornerstone/includes/utility/api.php   |
 *   -------------------------------------------
 *
 * For more documentation, please see: https://theme.co/community/kb/cornerstone-custom-elements/
 *
 **/
?>

<?php

class CSE_Carousel extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'cse_carousel',
      'title'       => __( 'Carousel', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Carousel description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'cse_carousel_item',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Slides', csl18n() ),
      __( 'Add a new slide to your carousel.', csl18n() ),
      array(
        array( 'title' => __( 'Slide 1', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/3498db/2980b9" alt="Placeholder">' ),
        array( 'title' => __( 'Slide 2', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/9b59b6/8e44ad" alt="Placeholder">' ),
        array( 'title' => __( 'Slide 3', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/3498db/2980b9" alt="Placeholder">' ),
        array( 'title' => __( 'Slide 4', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/9b59b6/8e44ad" alt="Placeholder">' ),
        array( 'title' => __( 'Slide 5', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/3498db/2980b9" alt="Placeholder">' ),
        array( 'title' => __( 'Slide 6', csl18n() ), 'content' => '<img src="http://placehold.it/1200x600/9b59b6/8e44ad" alt="Placeholder">' )
      ),
      array(
        'element'  => 'cse_carousel_item',
        'newTitle' => __( 'Slide %s', csl18n() ),
        'floor'    => 1
      )
    );
    
    $this->addControl(
      'slidesToShow',
      'number',
      __( 'Slides to show', csl18n() ),
      __( 'The number of slides to show in the carousel.', csl18n() ),
      '4'
    );

    $this->addControl(
      'slidesToScroll',
      'number',
      __( 'Slides to scroll', csl18n() ),
      __( 'The number of slides to scroll in the carousel.', csl18n() ),
      '1'
    );

    $this->addControl(
      'no_container',
      'toggle',
      __( 'No Container', csl18n() ),
      __( 'Select to remove the container around the slider.', csl18n() ),
      false
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $contents = '';

    foreach ( $elements as $e ) {

      $item_extra = $this->extra( array(
        'id'    => $e['id'],
        'class' => $e['class'],
        'style' => $e['style']
      ) );

      $contents .= '[cse_carousel_item' . $item_extra . ']' . $e['content'] . '[/cse_carousel_item]';

    }

    $touch = ($touch == 'false') ? 'touch="false"' : '';

    $shortcode = "[cse_carousel animation=\"$animation\" slide_time=\"$slide_time\" slide_speed=\"$slide_speed\" slideshow=\"$slideshow\" random=\"$random\" control_nav=\"$control_nav\" prev_next_nav=\"$prev_next_nav\" no_container=\"$no_container\" {$touch}{$extra}]{$contents}[/cse_carousel]";

    return $shortcode;

  }

}