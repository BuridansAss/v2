<?php


namespace KissTools\Engine\Text;


interface TextHandler
{
    /**
     * @param AbstractDescriptor $descriptor
     */
    public function handle(AbstractDescriptor $descriptor) : void ;
}