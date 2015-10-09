<?php
add_filter( 'get_twig', 'add_to_twig' );

function add_to_twig( $twig ) {
    return $twig;
}
