<?php


namespace App\Bots\Learning\Text\Handlers;


use App\Bots\Learning\Text\RowParseObserver;
use KissTools\Engine\Text\TextHandlers\Read\CsvRead;


class CsvMessageParser extends CsvRead
{

    /**
     * @param $row array
     */
    public function parseRow($row): void
    {
        $pattern ="/(\d+) отправил сообщение игроку (\d+): /";
        $keys = preg_split($pattern, $row[1], -1, PREG_SPLIT_DELIM_CAPTURE);

        $message = [];

        if (!isset($keys[3])) {
            return;
        }

        $row[0] = str_replace('@', '', $row[0]);

        $message['from'] = $keys[1];
        $message['to'] = $keys[2];
        $message['message'] = $keys[3];
        $message['time'] = strtotime($row[0]);

        RowParseObserver::event($message);
        echo 'Row' . PHP_EOL;

    }
}