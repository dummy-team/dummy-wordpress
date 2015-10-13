<?php
/**
 ** Register taxonomy
 **/
class DummyTaxonomy
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $ref;

    /**
     * @var array
     */
    protected $config;

    /**
     * Constructs this post
     */
    public function __construct( $id, $ref, $config )
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->config = $config;

        add_action( 'init', array($this, 'registerTaxonomy') );
    }
    
    /**
     * Register taxonomy
     */
    public function registerTaxonomy()
    {
        register_taxonomy( $this->id, $this->ref, $this->config );
    }
}
