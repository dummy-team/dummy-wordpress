<?php

if (function_exists('vc_remove_element')) {
    vc_remove_element( "vc_facebook" );
    vc_remove_element( "vc_tweetmeme" );
    vc_remove_element( "vc_googleplus" );
    vc_remove_element( "vc_pinterest" );
    // vc_remove_element( "vc_toggle" );
    // vc_remove_element( "vc_gallery" );
    vc_remove_element( "vc_images_carousel" );
    vc_remove_element( "vc_tabs" );
    vc_remove_element( "vc_tour" );
    vc_remove_element( "vc_accordion" );
    vc_remove_element( "vc_message" );
    vc_remove_element( "vc_posts_slider" );
    vc_remove_element( "vc_widget_sidebar" );
    vc_remove_element( "vc_video" );
    vc_remove_element( "vc_gmaps" );
    vc_remove_element( "vc_raw_js" );
    vc_remove_element( "vc_flickr" );
    vc_remove_element( "vc_progress_bar" );
    vc_remove_element( "vc_pie" );
    vc_remove_element( "vc_empty_space" );
    vc_remove_element( "vc_custom_heading" );
    vc_remove_element( "vc_basic_grid" );
    vc_remove_element( "vc_media_grid" );
    vc_remove_element( "vc_masonry_grid" );
    vc_remove_element( "vc_masonry_media_grid" );
    vc_remove_element( "vc_icon" );
    vc_remove_element( "vc_btn" );
    vc_remove_element( "vc_cta" );
    vc_remove_element( "rev_slider_vc" );
    vc_remove_element( "vc_wp_search" );
    vc_remove_element( "vc_wp_meta" );
    vc_remove_element( "vc_wp_recentcomments" );
    vc_remove_element( "vc_wp_calendar" );
    vc_remove_element( "vc_wp_pages" );
    vc_remove_element( "vc_wp_tagcloud" );
    vc_remove_element( "vc_wp_custommenu" );
    vc_remove_element( "vc_wp_text" );
    vc_remove_element( "vc_wp_posts" );
    vc_remove_element( "vc_wp_categories" );
    vc_remove_element( "vc_wp_archives" );
    vc_remove_element( "vc_wp_rss" );
    
    require_once('in_news_home/autoload.php');
    require_once('in_news_int/autoload.php');
} else {
    add_action( 'admin_notices', function() {
            echo '<div class="error"><p>Visual composer not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#js_composer' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
        } );
    return;
}
?>
