<?php
    function my_shortcode( $atts, $content = null ) {
        extract(shortcode_atts(array(
          'param_name' => '',
        ), $atts));

        $out = Timber::compile('my_shortcode.twig', array(
            'param_name' => $param_name,
            'content' => $content
        ));
        return $out;
    }
    add_shortcode('my_shortcode', 'my_shortcode');
