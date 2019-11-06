<?php


namespace KissTools\Engine\Text\Descriptors;


use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\Engine\Text\AbstractDescriptor;


class WriteDescriptor extends AbstractDescriptor
{
    /**
     * @param $path
     * @return static
     */
    public static function create($path) : AbstractDescriptor
    {
        $descriptor =  new static($path);
        $descriptor->handler = fopen($path, 'a');
        return  $descriptor;
    }
}