<?php


namespace KissTools\Engine\Images\Picture;



class Original extends Picture
{
    /**
     * @param $path
     * @return Original
     */
    public static function takeImageFromPicture($path) : Original
    {
        return new static($path);
    }

}