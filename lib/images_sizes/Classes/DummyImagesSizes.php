<?php
/**
 **
 **/
class DummyImagesSizes
{
  /***
  **** $name 
  **** int $width
  **** int $height
  **** bool|array $crop = false 
  ****/
  public function __construct( $name, $width, $height, $crop ) {
      $this->name = $name;
      $this->width = $width;
      $this->height = $height;
      $this->crop = $crop;

      $this->init();
  }

  public function init() {
    $this->addThemeSupport();
    $this->addImageSize();
  }

  public function addThemeSupport() {
      add_theme_support( $this->name );
  }

  public function addImageSize( ) {
      add_image_size( $this->name, $this->width, $this->height, $this->crop );
  }
}
?>


