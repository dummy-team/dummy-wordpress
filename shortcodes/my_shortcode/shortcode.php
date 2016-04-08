<?php
    vc_add_shortcode_param( 'custom_link', 'custom_link' );
    function custom_link( $settings, $value ) {

        $out = Timber::compile('template-backend.twig', array(
            'settings' => $settings,
            'value' => $value
        ));

       return $out;
    }

  function my_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'file' => '',
    ), $atts));

    $out = Timber::compile('template-front.twig', array(
        'file' => $file,
    ));

    return $out;
  }
  add_shortcode('my_shortcode', 'my_shortcode');

?>

