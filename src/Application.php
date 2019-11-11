<?php


namespace KissTools;


class Application
{
    private $config;

    private $commands;

    /**
     * Application constructor.
     */
    private function __construct()
    {
        $this->config = new ConfigHelper();
    }

    /**
     * @return Application
     */
    public static function start() : Application
    {
        $self = new self();

        return $self;
    }

    public function setCliArgs($args)
    {
        $this->commands = SplitArgs::getArgs($args);
    }

    /**
     * @return ConfigHelper
     */
    public function getConfig() : ConfigHelper
    {
        return $this->config;
    }
}