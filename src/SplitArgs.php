<?php


namespace KissTools;


use KissTools\Notifications\ConsolePrinter;

class SplitArgs
{
    /**
     * @param $args
     * @return array
     */
    public static function getArgs($args) : array
    {
        unset($args[0]);

        if (count($args) === 0) {
            ConsolePrinter::staticNeutralMessage('command does\'t exist');
            return [];
        }

        foreach ($args as $arg) {
            ConsolePrinter::staticGoodMessage('command: ' . $arg);
        }

        return $args;
    }
}