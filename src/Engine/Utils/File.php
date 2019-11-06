<?php


namespace KissTools\Engine\Utils;


class File
{
    /**
     * @param $file string
     * @param $extension string
     * @return bool
     */
    public static function isExtension($file, $extension) : bool
    {
        $ext = mb_strlen($extension, 'utf-8');
        $fileExt = substr($file, -$ext);

        if ($fileExt === $extension) {
            return true;
        }

        return false;
    }
}