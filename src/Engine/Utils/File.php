<?php


namespace KissTools\Engine\Utils;


use KissTools\Engine\Notifications\ConsolePrinter;

class File
{
    /**
     * @param $file string
     * @param $extension string
     * @return bool
     */
    public static function isExtension($file, $extension) : bool
    {
        if (is_dir($file)) {
            ConsolePrinter::exceptionExitFromApp($file . ' Это не файл, у него нет расширения чел!!');
        }

        $ext = mb_strlen($extension, 'utf-8');
        $fileExt = substr($file, -$ext);

        if ($fileExt === $extension) {
            return true;
        }

        return false;
    }

    /**
     * @param $file string
     * @return string
     */
    public static function getExtension($file) : string
    {
        if (is_dir($file)) {
            ConsolePrinter::exceptionExitFromApp($file . ' Это не файл, у него нет расширения чел!!');
        }

        $countSymbols = mb_strlen($file);
        $symbols = mb_str_split($file);
        $ext = '';

        for ($i = $countSymbols - 1; $i >= 0; $i--) {

            if ($symbols[$i] === '.') {
                break;
            }

            $ext = $symbols[$i] . $ext;
        }

        return $ext;
    }
}