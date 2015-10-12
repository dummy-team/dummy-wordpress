<?php
/**
 ** Register Scripts
 **/
class DummyRegisterScripts
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
        $this->id = $id
        $this->path = $path;
        $this->deps = $deps;
        $this->version = $version;
        $this->inFooter = $inFooter;

        add_action( 'wp_enqueue_scripts', array($this, 'register_scripts') );
    }

    /**
     * Register scripts
     */
    public function register_scripts()
    {
        wp_enqueue_script( $this->id, $this->path, $this->deps, $this->version, $this->inFooter );
    }
}
