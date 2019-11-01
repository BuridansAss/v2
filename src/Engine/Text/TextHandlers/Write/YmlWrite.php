<?php


namespace KissTools\Engine\Text\TextHandlers\Write;


use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\TextHandler;

abstract class YmlWrite implements TextHandler
{

    /**
     * @param AbstractDescriptor $descriptor
     */
    public function handle(AbstractDescriptor $descriptor): void
    {
        $handle = $descriptor->getHandler();


    }
}