<?php
add_filter( 'before_init', function before_init ( $settings ) {
    $style_formats = array(
        /* Paragraphe */
        array( 'title' => 'Chapeau', 'selector' => 'p', 'classes' => 'paragraphe-class' ),

        /* Link */
        array( 'title' => 'Bouton bordure orange', 'selector' => 'a', 'classes' => 'link-class' ),

        /* Title */
        array( 'title' => 'Chiffres', 'selector' => 'h2', 'classes' => 'title-class' ),

        /* Span */
        array( 'title' => 'Service : garages', 'inline' => 'span', 'classes' => 'span-class' ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    $settings['remove_script_host'] = true;
    $settings['convert_urls'] = true;

    return $settings;
} );
