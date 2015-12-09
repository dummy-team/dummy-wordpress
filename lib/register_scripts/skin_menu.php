<?php
wp_register_script( 'skin_menu',
    get_stylesheet_directory_uri() . '/web/js/vendors/Menu.min.js',
    array('jquery');
wp_enqueue_script('skin_menu');

wp_register_script( 'skin_menu_mob',
    get_stylesheet_directory_uri() . '/web/js/vendors/menu.Mobile.js',
    array('jquery');
wp_enqueue_script('skin_menu_mob');
