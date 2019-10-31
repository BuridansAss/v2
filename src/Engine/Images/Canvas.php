<?php


namespace KissTools\Engine\Images;


use Imagick;
use ImagickPixel;

class Canvas
{
    /**
     * @var Imagick
     */
    private $canvas;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $format;

    /**
     * Canvas constructor.
     */
    private function __construct()
    {
        $this->canvas = new Imagick();
    }

    /**
     * @return Canvas
     */
    public static function init() : Canvas
    {
        return new self();
    }

    /**
     * @param $width int
     * @param $height int
     * @param $format string
     */
    private function createEmptyCanvas($width, $height, $format) : void
    {
        $this->canvas->newImage($width, $height, new ImagickPixel('rgba(0, 0, 0, 0)'));
        $this->canvas->setImageFormat($format);
    }

    /**
     * @param $width int
     * @return Canvas
     */
    public function setWidth($width) : Canvas
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param $height int
     * @return Canvas
     */
    public function setHeight($height) : Canvas
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param $format string
     * @return Canvas
     */
    public function setFormat($format) : Canvas
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return Canvas
     */
    public function create() : Canvas
    {
        $this->createEmptyCanvas($this->width, $this->height, $this->format);
        return $this;
    }

    /**
     * @param $path
     */
    public function save($path) : void
    {
        file_put_contents($path, $this->canvas);
    }

    /**
     * @param Picture $picture
     * @param $x
     * @param $y
     * @return Canvas
     */
    public function drawImage(Picture $picture, $x, $y) : Canvas
    {
        $this->canvas->compositeImage($picture->getPicture(), Imagick::COMPOSITE_ADD, $x, $y);
        return $this;
    }
}