<?php
/**
 ** Register images size
 **/
add_action('init', function(){
    add_image_size( 'post_home_thumbnail', 390, 425, true );
});
