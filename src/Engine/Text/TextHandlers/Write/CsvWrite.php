<?php


namespace KissTools\Engine\Text\TextHandlers\Write;


use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Utils\File;


abstract class CsvWrite extends Writer
{


    /**
     * @param AbstractDescriptor $descriptor
     * @param $line string|array
     */
    protected function write(AbstractDescriptor $descriptor, $line): void
    {
        $this->checkCsvExt($descriptor);

        fputcsv($descriptor->getHandler(), $line);
    }

    /**
     * @param AbstractDescriptor $descriptor
     */
    private function checkCsvExt(AbstractDescriptor $descriptor) : void
    {
        $path = $descriptor->getPath();

        $isCsv = File::isExtension($path, 'csv');

        if (!$isCsv) {
            $descriptor->close();

            unlink($path);
            ConsolePrinter::exceptionExitFromApp('Это не csv файл');
        }
    }
}