<?php


namespace KissTools\Engine\Text\TextHandlers\Read;


use KissTools\Engine\Text\AbstractDescriptor;
use KissTools\Engine\Text\Iventable;
use KissTools\Engine\Text\Reader;
use KissTools\Engine\Text\TextHandlers\ReadObserver;

abstract class CsvReadV2 implements Reader, Iventable
{

     /**
      * @var AbstractDescriptor
      */
    private $descriptor;

     /**
      * @var ReadObserver
      */
    private $observer;

    public function __construct(AbstractDescriptor $descriptor, ReadObserver $readObserver)
    {
        $this->descriptor = $descriptor;
        $this->observer = $readObserver;
    }

     /**
      *
      */
    public function read() : void
    {
        $handle = $this->descriptor->getHandler();

        while (!feof($handle)) {
            if (($row = fgetcsv($handle)) !== '') {
                $parse = $this->parse($row);
                $this->occurred($parse);
            }

        }

        $this->descriptor->close();

    }

    /**
     * @param $string string
     * @return mixed
     */
    abstract function parse($string);

    public function occurred($args): void
    {
        if ($this->observer !== null) {
            $this->observer->sendEvent($args);
        }
    }
 }