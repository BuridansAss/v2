<?php


namespace App\Bots\Learning\Text;


interface RowParseListener
{
    /**
     * @param $args array
     */
    public function rowParseHappened($args) : void;
}