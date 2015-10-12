<?php
/** If constant isn't defined on wp-config file
  * Enable or Disable Twig cache on template rendering
  */
if ( !defined('TWIG_CACHE_ENABLE') ) {
    define('TWIG_CACHE_ENABLE', false);
}

if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        sprintf(
            '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="%d">%d</a></p></div>', 
            esc_url(admin_url('plugins.php#timber')), 
            esc_url( admin_url('plugins.php'))
        );
    });
}

$dummyTimberSite = new TimberSite();
