<?php
/**
 ** Add menu
 **/
class DummyMenu 
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * Constructs this post
     */
    public function __construct( $id, $description ) 
    {
        $this->id = $id;
        $this->description = $description;

        add_action( 'init', array($this, 'register_menu') );
        add_filter( 'timber_context', array($this, 'add_to_context' ) );
    }

    /**
     * Register menu
     */
    public function register_menu() 
    {
        register_nav_menu( $this->id, $this->description );
    }

    /**
     * Add to Timber
     */
    public function add_to_context( $context ) 
    {
        $context['menu'][$this->id] = new TimberMenu($this->id);
        return $context;
    }
}
