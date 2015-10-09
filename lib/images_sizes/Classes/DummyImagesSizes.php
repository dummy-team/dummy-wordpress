<?php
/**
 **
 **/
class DummyImagesSizes {
    /***
    **** string $name 
    **** int $width
    **** int $height
    **** bool|array $crop = false 
    ****/
    public function __construct( $name, $width, $height, $crop ) {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
        $this->crop = $crop;

        $this->addImageSize();
    }

    public function addImageSize() {
        add_image_size( $this->name, $this->width, $this->height, $this->crop );
    }
}
