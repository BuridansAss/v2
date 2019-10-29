<?php


namespace KissTools\Engine\Images\Picture;


class Transformed extends Picture
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @param Original $original
     * @return Transformed
     */
    public static function copy(Original $original) : Transformed
    {
        $self = new static($original->getSrcPath());

        $self->width = $original->getWidth();
        $self->height = $original->getHeight();

        return $self;
    }

    /**
     * @param $width
     * @return Transformed
     */
    public function setWidth($width) : Transformed
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @param $height
     * @return Transformed
     */
    public function setHeight($height) : Transformed
    {
        $this->width = $height;

        return $this;
    }

    /**
     * transform image size
     */
    public function transform() : void
    {
        $this->image->thumbnailImage($this->width, $this->height);
    }
}