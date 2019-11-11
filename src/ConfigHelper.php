<?php


namespace KissTools;


use KissTools\Engine\Notifications\ConsolePrinter;

class ConfigHelper
{
    private $config;

    /**
     * ConfigHelper constructor.
     * @param $config array
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        ConsolePrinter::exceptionExitFromApp('нет такой настройке в конфиге');
    }
}