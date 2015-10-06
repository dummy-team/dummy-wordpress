<?php
add_filter( 'get_twig', 'add_to_twig' );

function add_to_twig( $twig ) {
    /* this is where you can add your own fuctions to twig */
    return $twig;
}
