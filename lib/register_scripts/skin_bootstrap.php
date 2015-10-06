<?php
add_action( 'wp_enqueue_scripts', 'register_skin_bootstrap' );

function register_skin_bootstrap() {
    wp_enqueue_script('skin_multiselect_bootstrap', get_template_directory_uri() . '/web/js/vendors/bootstrap-multiselect.js', array('jquery'), '0.0.0', true );
    wp_enqueue_script('skin_bootstrap', get_template_directory_uri() . '/web/js/vendors/bootstrap.min.js', array('jquery'), '0.0.0', true );
}
