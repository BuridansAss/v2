<?php


namespace App\Bots\Learning\Text;


class RowParseObserver
{
    /**
     * @var array
     */
    private static $listeners = [

    ];

    /**
     * @param $arg
     */
    public static function event($arg = null) : void
    {
        foreach (self::$listeners as $listener) {
            $listener->rowParseHappened($arg);
            echo 'event send';
        }
    }

    /**
     * @param RowParseListener $listener
     */
    public static function addListener(RowParseListener $listener) : void
    {
        self::$listeners[] = $listener;
        echo 'listener add';
    }

}