<?php


namespace App\Bots\Learning;


use App\Bots\Learning\Text\Handlers\CsvBaseCreator;
use App\Bots\Learning\Text\Handlers\CsvMessageParser;
use App\Bots\Learning\Text\RowParseListener;
use App\Bots\Learning\Text\RowParseObserver;
use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\Engine\Text\Descriptors\ReadDescriptor;
use KissTools\Engine\Text\Descriptors\WriteDescriptor;

class CsvBusByMentorWardDialog implements RowParseListener
{
    /**
     * @var string
     */
    private $path;

    private $cw;

    private $writeDescriptor;

    /**
     * CsvBusByMentorWardDialog constructor.
     * @param $path string
     */
    public function __construct($path)
    {
        RowParseObserver::addListener($this);

        if (!is_dir($path)) {
            ConsolePrinter::exceptionExitFromApp('такой папки не существует');
        }

        $this->path = $path;

        $this->cw = new CsvBaseCreator();

        // TODO убрать хардкод
        $this->writeDescriptor = WriteDescriptor::create('/home/evgen/Prjs/kiss-tools/KissTools/bots/dialogs/base.csv');
    }

    /**
     * @param $arg
     */
    public function rowParseHappened($arg): void
    {
        echo print_r($arg,1);

        $this->cw->setLine($arg);
        $this->cw->handle($this->writeDescriptor);
    }

    /**
     * @return void
     */
    public function read() : void
    {
        $checkAllDialogs = false;
        $i = 1;

        while (!$checkAllDialogs) {


            $path = $this->path . '/Mentor' . $i . '.csv';

            if (!file_exists($path)) {
                $checkAllDialogs = true;
                continue;
            }

            $this->cw->setLine(['', 'Dialog', '']);
            $this->cw->handle($this->writeDescriptor);

            $cr = new CsvMessageParser();
            $descriptor = ReadDescriptor::create($path);
            $cr->handle($descriptor);

            $i++;
        }
    }
}