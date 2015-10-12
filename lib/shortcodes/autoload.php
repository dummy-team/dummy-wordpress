<?php

if (function_exists('vc_remove_element')) {
    require_once('vc_remove/autoremove.php');

    require_once('in_news_home/autoload.php');
    require_once('in_news_int/autoload.php');
} else {
    add_action( 'admin_notices', function() {
        sprintf(
            '<div class="error"><p>Visual composer not activated. Make sure you activate the plugin in <a href="%d">%d</a></p></div>',
            esc_url(admin_url('plugins.php#js_composer')), 
            esc_url( admin_url('plugins.php'))
        );
    });
    return;
}
