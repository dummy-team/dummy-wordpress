<?php
/** If constant isn't defined on wp-config file
  * Enable or Disable Twig cache on template rendering
  */
if ( !defined('TWIG_CACHE_ENABLE') ) {
	define('TWIG_CACHE_ENABLE', false);
}

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

class StarterSite extends TimberSite {

	public function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );

		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
    add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
    add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ) );
    add_filter( 'mce_buttons_2', array( $this, 'add_mce_buttons_2' ) );

    add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'init', array( $this, 'register_taxonomies' ) );
    add_action( 'init', array( $this, 'register_menus' ) );
    add_action( 'init', array( $this, 'add_rss_feed' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
    add_action( 'admin_init', array( $this, 'add_editor_styles' ) );
		parent::__construct();
	}

	public function add_rss_feed () {
    add_feed('mobile-events', function(){ get_template_part( 'rss', 'mobile-events' ); } );
  }

	public function add_mce_buttons_2 ( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
  }

  public function tiny_mce_before_init ( $settings ) {
    $style_formats = array(
      array( 'title' => 'Orange', 'selector' => 'h2', 'classes' => 'orange' ),
      array( 'title' => 'Blanc', 'selector' => 'h2,p,h4', 'classes' => 'white' ),
      array( 'title' => 'Bleu', 'selector' => 'h3', 'classes' => 'blue' ),
      array( 'title' => 'Avec bordure', 'selector' => 'h2', 'classes' => 'border-bottom' ),
      array( 'title' => 'Bouton bordure orange', 'selector' => 'a', 'classes' => 'button-orange-bordered' ),
      array( 'title' => 'Bouton bordure bleue', 'selector' => 'a', 'classes' => 'button-purple-bordered' ),
      array( 'title' => 'Bouton fond orange', 'selector' => 'a', 'classes' => 'button-orange-background' ),
      array( 'title' => 'Bouton fond bleu', 'selector' => 'a', 'classes' => 'button-purple-background' )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
  }

  public function add_editor_styles() {
    add_editor_style( 'web/css/custom-editor-style.css' );
  }

	public function register_post_types() {
		//this is where you can register custom post types
		register_post_type( 'event',
      array(
        'capability_type' => 'post',
        'label'  => __( 'Événements', 'skin-dummy' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'rewrite' => array( 'slug' => 'agenda' ),
        'public' => true,
        'has_archive' => true,
        'with_front' => true
      )
    );
	}

	public function register_taxonomies() {
		//this is where you can register custom taxonomies
		register_taxonomy(
      'event-category',
      'event',
      array(
          'label' => __( 'Catégories', 'skin-dummy' ),
          'public' => true,
          'rewrite' => true,
          'hierarchical' => true,
          'show_ui' => true
      )
    );
	}

	public function register_menus() {
    //this is where you can register menus
    register_nav_menus( array(
      'main'     => __('Menu principal', 'skin-dummy'),
      'footer-1' => __('Menu footer principal', 'skin-dummy'),
      'footer-2' => __('Menu footer secondaire', 'skin-dummy')
    ) );
  }

  public function register_scripts() {
    //this is where you can register scripts
    wp_enqueue_script('skin-main-js', get_template_directory_uri().'/web/js/main.js', array('jquery'), false);
    wp_enqueue_style('js_composer_front'); // Add composer files to all templates
  }

	public function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		// Menu
    $context['menu'] = new stdClass();
    $context['menu']->main = new TimberMenu('main');
    $context['menu']->footer_1 = new TimberMenu('footer-1');
    $context['menu']->footer_2 = new TimberMenu('footer-2');
    $context['menu']->services = new TimberMenu('services');
    // Home url
    $this->home_url = home_url();
    $context['site'] = $this;
    // Header background image
    $context['header_image'] = get_field('header_image');
    $context['header_title'] = get_field('header_title');
    $context['header_subtitle'] = get_field('header_subtitle');
    // Post type
    $context['post_type'] = get_post_type();
		return $context;
	}

	public function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		// $twig->addExtension( new Twig_Extension_StringLoader() );
		// $twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}

}

new StarterSite();
