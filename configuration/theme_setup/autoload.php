<?php
/**
 ** Load after setup theme
 **/
add_action('after_setup_theme', function(){
    require_once('textdomain.php');
});
