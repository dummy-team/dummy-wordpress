<?php
/**
 ** Add themes support
 **/
class DummyThemesSupport
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var array
     */
    protected $config;

    /**
     * Constructs this post
     */
    public function __construct( $id, $config = array() )
    {
        $this->id = $id;
        $this->config = $config;

        $this->themesSupport();
    }
    
    /**
     * Add theme support
     */
    public function themesSupport()
    {
        add_theme_support( $this->id, $this->config );
    }
}
