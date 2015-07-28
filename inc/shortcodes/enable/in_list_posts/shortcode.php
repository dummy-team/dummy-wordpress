<?php
  function in_list_posts( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'title' => '',
      'subtitle' => '',
      'link' => '/'
    ), $atts));

    // $link = vc_build_link($link);

    $data = array( 'bar' => 'foo' );

    $out = Timber::compile('template.twig', $data);

    return $out;
  }
  add_shortcode('in_list_posts', 'in_list_posts');
?>
