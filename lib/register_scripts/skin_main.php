<?php
wp_register_style('skin_main_css',
    get_stylesheet_directory_uri().'/web/css/main.css');
wp_enqueue_style('skin_main_css');

wp_register_script( 'skin_main_js',
    get_stylesheet_directory_uri().'/web/js/main.js',
    array('jquery', 'js_cookie') );
wp_enqueue_script('skin_main_js');
