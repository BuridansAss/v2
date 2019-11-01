<?php


namespace KissTools\Engine\Text\TextHandlers\Read;


use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\TextHandler;
use function GuzzleHttp\Psr7\str;

 abstract class CsvRead implements TextHandler
{

    /**
     * @param AbstractDescriptor $descriptor
     */
    public function handle(AbstractDescriptor $descriptor): void
    {
        $handle = $descriptor->getHandler();

        while (!feof($handle)) {
            if (($row = fgetcsv($handle)) !== '') {
                $this->parseRow($row);
            }

        }

        $descriptor->close();
    }

     /**
      * @param $row array
      */
    abstract public function parseRow($row) : void;
}