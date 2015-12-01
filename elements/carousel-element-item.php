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

class CSE_Carousel_Item extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'cse_carousel_item',
      'title'       => __( 'Carousel Item', csl18n() ),
      'section'     => '_content',
      'description' => __( 'Carousel Item description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'render'      => false,
      'delegate'    => true
    );
  }

  public function controls() {

    $this->addControl(
      'title', // control name
      'title', // control type
      NULL,    // message
      NULL,    // tooltip text
      ''       // placeholder text
    );

    $this->addControl(
      'content', // control name
      'editor',  // control type
      __( 'Content', csl18n() ), // message
      __( 'Include your desired content for your Carousel Item here.', csl18n() ), // tooltip text
      '' // placehlder text
    );

  }

}