<?php
/**
 ** Add image size
 **/
class DummyImagesSizes
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $width;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var boolean|array
     */
    protected $crop;

    /**
     * Constructs this post
     */
    public function __construct( $name, $width, $height, $crop )
    {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
        $this->crop = $crop;

        $this->addImageSize();
    }

    /**
     * Add image size
     *
     * @param string $name
     * @param int $width
     * @param int $height
     * @param boolean/array $crop
     * @return void
     */
    public function addImageSize()
    {
        add_image_size( $this->name, $this->width, $this->height, $this->crop );
    }
}
