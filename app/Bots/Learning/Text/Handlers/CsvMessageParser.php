<?php


namespace App\Bots\Learning\Text\Handlers;


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

        $pattern = "/\d{2}:\d{2}:\d{2}/";

        $message = [];

        if (!isset($keys[3])) {
            return;
        }
        $message['from'] = $keys[1];
        $message['to'] = $keys[2];
        $message['message'] = $keys[3];

        echo print_r($message, 1);
    }
}