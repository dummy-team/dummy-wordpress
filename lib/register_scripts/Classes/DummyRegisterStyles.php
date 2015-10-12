<?php
/**
 ** Register Scripts
 **/
class DummyRegisterStyles
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $deps;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var boolean
     */
    protected $inFooter;

    /**
     * Constructs this post
     */
    public function __construct( $id, $path = NULL, $deps = array(), $version = '0.0.0', $inFooter = true )
    {
        $this->id = $id;
        $this->path = $path;
        $this->deps = $deps;
        $this->version = $version;
        $this->inFooter = $inFooter;

        add_action( 'wp_enqueue_style', array($this, 'register_styles') );
    }

    /**
     * Register styles
     */
    public function register_styles()
    {
        wp_enqueue_script( $this->id, $this->path, $this->deps, $this->version, $this->inFooter );
    }
}
