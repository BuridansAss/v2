<?php


namespace KissTools\Engine\Text\TextHandlers\Write;


use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\Writer;
use KissTools\Engine\Utils\File;

abstract class CsvWriteV2 implements Writer
{
    /**
     * @var AbstractDescriptor
     */
    private $descriptor;

    public function __construct(AbstractDescriptor $descriptor)
    {
        $this->descriptor = $descriptor;
    }

    public function write($string)
    {
        $this->checkCsvExt();

        fputcsv($this->descriptor->getHandler(), $string);
    }

    /**
     *
     */
    private function checkCsvExt() : void
    {
        $path = $this->descriptor->getPath();

        $isCsv = File::isExtension($path, 'csv');

        if (!$isCsv) {
            $this->descriptor->close();

            unlink($path);
            ConsolePrinter::exceptionExitFromApp('Это не csv файл');
        }
    }
}