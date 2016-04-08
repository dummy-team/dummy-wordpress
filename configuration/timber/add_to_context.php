<?php

add_filter( 'timber_context', function( $context ) {
    // Post type
    $context['post_type'] = get_post_type();

    // Media path
    $context['path_theme'] = get_template_directory_uri();
    $context['path_css'] = $context['path_theme'].'/web/css/';
    $context['path_fonts'] = $context['path_theme'].'/web/fonts/';
    $context['path_img'] = $context['path_theme'].'/web/img/';
    $context['path_js'] = $context['path_theme'].'/web/js/';

    // breadCrump
    if(function_exists('yoast_breadcrumb')){
        $context['breadcrumb'] = yoast_breadcrumb('<p>','</p>', false );
    }
    $context['display_breadcrumb'] = true;

    // Menu
    $context['menu'] = new stdClass();
    $context['menu']->main = new TimberMenu('main');
    $context['menu']->footer = new TimberMenu('footer');

    return $context;
} );
