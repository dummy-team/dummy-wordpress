<?php
/**
 **
 **/
class DummyTaxonomy
{
  public function __construct( $id, $ref, $config ) {
    $this->id = $id;
    $this->ref = $ref;
    $this->config = $config;

    add_action( 'init', array($this, 'registerTaxonomy') );
  }
  
  public function registerTaxonomy() {
    register_taxonomy( $this->id, $this->ref, $this->config );
  }
}
