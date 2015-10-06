<?php
  /**
   **
   **/
  class DummyRegisterStyles
  {
    public function __construct( $id, $path = NULL, $deps = array(), $version = '0.0.0', $inFooter = true ) {
        $this->id = $id;
        $this->path = $path;
        $this->deps = $deps;
        $this->version = $version;
        $this->inFooter = $inFooter;

        add_action( 'wp_enqueue_styles', array($this, 'register_styles') );
    }

    public function register_styles() {
      wp_enqueue_style( $this->id, $this->path, $this->deps, $this->version, $this->inFooter );
    }
  }
?>