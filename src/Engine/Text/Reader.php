<?php


namespace KissTools\Engine\Text;


interface Reader
{
    /**
     *
     */
    public function read() : void ;

    /**
     * @param $string string
     * @return mixed
     */
    public function parse($string);
}