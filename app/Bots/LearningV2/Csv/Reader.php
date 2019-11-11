<?php


namespace App\Bots\LearningV2\Csv;


use App\Bots\Learning\Text\RowParseObserver;
use KissTools\Engine\Text\TextHandlers\Read\CsvReadV2;

class Reader extends CsvReadV2
{

    /**
     * @param $string string
     * @return mixed
     */
    function parse($string)
    {
        $pattern ="/(\d+) отправил сообщение игроку (\d+): /";
        $keys = preg_split($pattern, $string[1], -1, PREG_SPLIT_DELIM_CAPTURE);

        $message = [];

        if (!isset($keys[3])) {
            return;
        }

        $string[0] = str_replace('@', '', $string[0]);

        $message['from'] = $keys[1];
        $message['to'] = $keys[2];
        $message['message'] = $keys[3];
        $message['time'] = strtotime($string[0]);

        RowParseObserver::event($message);
        return;
    }
}