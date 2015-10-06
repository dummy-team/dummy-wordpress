<?php
add_action( 'wp_enqueue_scripts', 'register_skin_main' );

function register_skin_main() {
    wp_enqueue_script('skin_main_js', get_template_directory_uri().'/web/js/main.js', array('jquery'), '0.0.0', true );
}
