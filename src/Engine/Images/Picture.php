<?php


namespace KissTools\Engine\Images\Picture;


use Imagick;
use ImagickException;
use KissTools\Notifications\ConsolePrinter;

 abstract class Picture
{
    private const ERROR_MESSAGE_1 = ' Проблема в пути к исходной картинке! Возможно там нет картинки';

    /**
     * @var Imagick
     */
    protected $image;

    /**
     * @var string
     */
    private $srcPath;

    /**
     * Picture constructor.
     * @param $path string
     */
    protected function __construct($path)
    {
        try {
            $this->srcPath = $path;
            $this->image = new Imagick($path);
        } catch (ImagickException $e) {
            ConsolePrinter::exceptionExitFromApp($e->getMessage() . self::ERROR_MESSAGE_1);
        }
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->image->getImageWidth();
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->image->getImageHeight();
    }

    /**
     * @return Imagick
     */
    public function getPicture() : Imagick
    {
        return $this->image;
    }

     /**
      * @return string
      */
    protected function getSrcPath(): string
    {
        return $this->srcPath;
    }
}