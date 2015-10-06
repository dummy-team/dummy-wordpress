<?php
  /**
   **
   **/
  class DummyPostType
  {
    public function __construct( $id, $config ) {
      $this->id = $id;
      $this->config = $config;

      add_action( 'init', array($this, 'registerPostType') );
    }
    
    public function registerPostType() {
      register_post_type( $this->id , $this->config );
    }
  }
?>

