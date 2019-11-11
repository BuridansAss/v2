<?php


namespace KissTools\Engine\Text\TextHandlers;


interface ReadListener
{
    /**
     * сделает что-то если произойдет событие чтения
     * @param $args
     */
    public function doIt($args) : void;
}