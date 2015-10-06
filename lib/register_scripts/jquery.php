<?php
add_action( 'wp_enqueue_scripts', 'register_jquery' );

function register_jquery() {
    wp_enqueue_script('jquery');
}
