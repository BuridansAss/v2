<?php


namespace KissTools\Engine\Text\TextHandlers\Write;


use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\TextHandler;

abstract class Writer implements TextHandler
{
    /**
     * @var string|array
     */
    protected $line;


    /**
     * @param AbstractDescriptor $descriptor
     */
    public function handle(AbstractDescriptor $descriptor): void
    {
        $this->write($descriptor, $this->line);
    }

    /**
     * @param $line string|array
     */
    public function setLine($line) : void
    {
        $this->line = $line;
    }

    /**
     * @param AbstractDescriptor $descriptor
     * @param $line string|array
     */
    abstract protected function write(AbstractDescriptor $descriptor, $line) : void;
}