<?php
add_action( 'wp_enqueue_scripts', 'register_composer_front' );

function register_composer_front() {
    wp_enqueue_style('js_composer_front'); // Add composer files to all templates
    wp_enqueue_script('wpb_composer_front_js'); // Add composer files to all templates
}
