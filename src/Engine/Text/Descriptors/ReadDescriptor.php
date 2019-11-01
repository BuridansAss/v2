<?php


namespace KissTools\Engine\Text\Descriptors;


use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\Engine\Text\AbstractDescriptor;


class ReadDescriptor extends AbstractDescriptor
{
    /**
     * @param $path
     * @return static
     */
    public static function create($path) : AbstractDescriptor
    {
        if (!file_exists($path)) {
            ConsolePrinter::exceptionExitFromApp($path . ' файла не существует');
        }

        $descriptor =  new static($path);
        $descriptor->handler = fopen($path, 'r');
        return  $descriptor;
    }

}