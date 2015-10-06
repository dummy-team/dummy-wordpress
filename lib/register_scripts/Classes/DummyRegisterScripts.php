<?php
  /**
   **
   **/
  class DummyRegisterScripts
  {
    public function __construct( $id, $path = NULL, $deps = array(), $version = '0.0.0', $inFooter = true ) {
        $this->id = $id;
        $this->path = $path;
        $this->deps = $deps;
        $this->version = $version;
        $this->inFooter = $inFooter;

        add_action( 'wp_enqueue_scripts', array($this, 'register_scripts') );
    }

    public function register_scripts() {
      wp_enqueue_script( $this->id, $this->path, $this->deps, $this->version, $this->inFooter );
    }
  }
?>
