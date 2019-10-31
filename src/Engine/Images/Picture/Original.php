<?php


namespace KissTools\Engine\Images\Picture;


use KissTools\Engine\Images\Picture;


class Original extends Picture
{
    /**
     * @param $path
     * @return Original
     */
    public static function takeImageFromPicture($path) : Picture
    {
        return new static($path);
    }

}