<?php
/**
 **
 **/
class DummyThemesSupport {
    /***
    **** string $id 
    **** array $config 
    ****/
    public function __construct( $id, $config = array() ) {
        $this->id = $id;
        $this->config = $config;

        $this->themesSupport();
    }
    
    public function themesSupport() {
        add_theme_support( $this->id, $this->config; );
    }
}
