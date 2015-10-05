<?php
add_action( 'wp_enqueue_scripts', 'register_skin_modernizr' );

function register_skin_modernizr() {
    wp_enqueue_script('skin_modernizr', get_template_directory_uri() . '/web/js/vendors/modernizr.js', array(), '0.0.0', true );
}
