<?php

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Timber not installed. Make sure you run a composer install in the theme directory</p></div>';
    });
    return;
}
else {
    require_once(__DIR__ . '/vendor/autoload.php');
    $timber = new \Timber\Timber();
}

// Load Timber from composer


// Create our version of the TimberSite object
class StarterSite extends TimberSite {

    // This function applies some fundamental WordPress setup, as well as our functions to include custom post types and taxonomies.
    function __construct() {
        add_theme_support('post-thumbnails');
        add_theme_support('menus');

        add_filter('timber_context', array($this, 'add_to_context'));
        // add_filter('get_twig', array($this, 'add_to_twig'));
        add_filter('wp_mail_from', 'noreply@domain.com');
        add_filter('wp_mail_from_name', 'Administrateur');

        if (function_exists('vc_remove_element')) {
            add_filter('admin_init', array($this, 'vc_remove_shortcodes_from_vc_grid_element'));
        }

        add_action( 'admin_init', function() {
            add_editor_style( './lib/custom-editor-style.css' );
        });

        add_action('vc_before_init', array($this, 'vc_register_shortcodes'));
        add_action('tiny_mce_before_init', array($this, 'config_tiny_mce'));
        add_filter( 'mce_buttons', function($buttons) {
            array_unshift( $buttons, 'styleselect' );
            return $buttons;
        });


        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('init', array($this, 'register_menus'));
        add_action('init', array($this, 'register_widgets'));
        add_action('init', array($this, 'add_image_size'));

        $this->register_shortcodes();

        parent::__construct();
    }


    // Abstracting long chunks of code.

    // The following included files only need to contain the arguments and register_whatever functions. They are applied to WordPress in these functions that are hooked to init above.

    // The point of having separate files is solely to save space in this file. Think of them as a standard PHP include or require.

    function register_post_types(){
        require('lib/custom-types.php');
    }

    function register_taxonomies(){
        require('lib/taxonomies.php');
    }

    function register_menus(){
        require('lib/menus.php');
    }

    function register_shortcodes( ) {
        require('lib/register_shortcodes.php');
    }
    function vc_register_shortcodes( ) {
        require('lib/vc_register_shortcodes.php');
    }

    function register_widgets(){
        require('lib/widgets.php');
    }

    function add_image_size(){
        add_image_size('post_home_thumbnail', 400, 300, true );
    }

    function config_tiny_mce( $settings ){
        $style_formats = array(
            array( 'title' => 'Bouton', 'selector' => 'a, button', 'classes' => 'button' ),
        );
        $settings['style_formats'] = json_encode( $style_formats );
        $settings['remove_script_host'] = true;
        return $settings;
    }


    // Access data site-wide.

    // This function adds data to the global context of your site. In less-jargon-y terms, any values in this function are available on any view of your website. Anything that occurs on every page should be added here.

    function add_to_context($context) {

        // Our menu occurs on every page, so we add it to the global context.
        $context['menu'] = array(
            'main' => new TimberMenu('main'),
            'footer' => new TimberMenu('footer'),
        );

        $context['post_type'] = get_post_type();

        // breadCrump
        if(function_exists('yoast_breadcrumb')){
            $context['breadcrumb'] = yoast_breadcrumb('<p>','</p>', false );
        }

        // This 'site' context below allows you to access main site information like the site title or description.
        $context['site'] = $this;
        return $context;
    }

    // Here you can add your own fuctions to Twig. Don't worry about this section if you don't come across a need for it.
    // See more here: http://twig.sensiolabs.org/doc/advanced.html
    function add_to_twig($twig) {
        // $twig->addExtension(new Twig_Extension_StringLoader());
		// $twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }

    // Removes Visual Composer's shortcodes
    function vc_remove_shortcodes_from_vc_grid_element( ) {
        require('lib/vc_remove_shortcodes.php');
    }

}

new StarterSite();


/*
 *
 * My Functions (not from Timber)
 *
 */

// Enqueue scripts
function my_scripts() {

    // Use jQuery from a CDN
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//code.jquery.com/jquery-2.2.4.min.js', array(), null, true);

    // Enqueue our stylesheet and JS file with a jQuery dependency.
    // Note that we aren't using WordPress' default style.css, and instead enqueueing the file of compiled Sass.
    wp_enqueue_style('my-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);
    wp_enqueue_script('my-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}

add_action('wp_enqueue_scripts', 'my_scripts');
