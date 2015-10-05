<?php

add_filter( 'timber_context', 'add_to_context' );

function add_to_context( $context ) {
    // Post type
    $context['post_type'] = get_post_type();

    // Media path
    $context['path_skin'] = get_template_directory_uri();
    $context['path_css'] = $context['path_skin'].'/web/css/';
    $context['path_fonts'] = $context['path_skin'].'/web/fonts/';
    $context['path_img'] = $context['path_skin'].'/web/img/';
    $context['path_js'] = $context['path_skin'].'/web/js/';

    // breadCrump
    if(function_exists('yoast_breadcrumb')){
        $context['breadCrumbs'] = yoast_breadcrumb('<p>','</p>', false );
    }
    $context['showBreadCrumbs'] = true;

    //$context['link_all_news'] = get_page_link(76);
    //$context['showNewsAllLink'] = false;

    $context['housing_url'] = get_permalink(46);

    return $context;
}