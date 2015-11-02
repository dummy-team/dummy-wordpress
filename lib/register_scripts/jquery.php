<?php
wp_deregister_script('jquery');
wp_register_script('jquery',  get_stylesheet_directory_uri().'/web/js/vendors/jquery-1.11.3.min.js', false, '');
wp_enqueue_script('jquery');
