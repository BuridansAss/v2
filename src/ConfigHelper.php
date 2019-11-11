<?php


namespace KissTools;


use KissTools\Engine\Notifications\ConsolePrinter;

class ConfigHelper
{
    private $config;

    private $pathConfig;

    private $bootstrap;

    public function __construct()
    {
        $this->bootstrap = require '../app/bootstrap.config.php';
        $this->pathConfig = $this->bootstrap['config'];
        $this->config = require $this->pathConfig;
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

    /**
     * @return void
     */
    private function clearConfig() : void
    {
        file_put_contents($this->pathConfig, '');
    }

    /**
     * @return void
     */
    private function editConfigFile() : void
    {
        $this->clearConfig();

        $file = '<?php' . PHP_EOL . 'return' . PHP_EOL . '[' . PHP_EOL;

        foreach ($this->config as $key => $value) {
            $file = $file . "'$key'" . ' => ' . "'$value'," . PHP_EOL;
        }

        $file = $file . ']' . PHP_EOL . ';';

        file_put_contents($this->pathConfig, $file);

    }

    /**
     * @param $key string
     * @param $value
     */
    public function editConfig($key, $value) : void
    {
        if (!isset($this->config[$key])) {
            $this->config = array_merge($this->config, [$key => $value]);
        } else {
            $this->config[$key] = $value;
        }

        $this->clearConfig();

        $this->editConfigFile();
    }
}