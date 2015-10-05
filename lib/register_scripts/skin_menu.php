<?php
add_action( 'wp_enqueue_scripts', 'register_skin_menu' );

function register_skin_menu() {
    wp_enqueue_script('skin_menu', get_template_directory_uri() . '/web/js/vendors/Menu.min.js', array('jquery'), '0.0.0', true );
    wp_enqueue_script('skin_menu_mob', get_template_directory_uri() . '/web/js/vendors/menu.Mobile.js', array('jquery'), '0.0.0', true );
}
