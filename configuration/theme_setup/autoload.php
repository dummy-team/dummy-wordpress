<?php
/**
 ** Load after setup theme
 **/

// Send admin notices if Timber isn't installed
if( !is_plugin_active('timber-library/timber.php') ) {
    add_action( 'admin_notices', function(){
        $class = 'notice notice-error';
        $message = __( "L'extension Timber doit être installé pour pouvoir utiliser ce thème.", 'dummy-wordpress' );

        printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
    });
}

// Load textdomain
add_action('after_setup_theme', function(){
    require_once('textdomain.php');
});
