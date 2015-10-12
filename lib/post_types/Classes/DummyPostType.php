<?php
/**
 ** Register post type
 **/
class DummyPostType
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
    public function __construct( $id, $config )
    {
        $this->id = $id;
        $this->config = $config;
        
        add_action( 'init', array($this, 'registerPostType') );
    }

    /**
     * Register post type
     */
    public function registerPostType() 
    {
        register_post_type( $this->id , $this->config );
    }
}
