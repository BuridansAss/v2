<?php


namespace KissTools\Engine\Text\TextHandlers\Write;


use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\Writer;

class CsvWriteV2 implements Writer
{
    /**
     * @var AbstractDescriptor
     */
    private $descriptor;

    public function __construct(AbstractDescriptor $descriptor)
    {
        $this->descriptor = $descriptor;
    }

    public function write($string)
    {

    }
}