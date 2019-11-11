<?php


namespace App\Bots\LearningV2;


use KissTools\ConfigHelper;
use KissTools\Engine\Text\TextHandlers\ReadObserver;
use KissTools\Engine\Utils\Directory;

class Init
{
    /**
     * @var ConfigHelper
     */
    private $configHelper;

    private $input;

    private $output;

    private $observer;

    /**
     * Init constructor.
     */
    public function __construct()
    {
        $this->configHelper = new ConfigHelper();
        $this->observer = new ReadObserver();

        $this->input = $this->configHelper->get('mentorDialogs');
        $this->output = $this->configHelper->get('csvCultivatedDialogs');
    }

    public function getMentorDialogs()
    {
        $files = Directory::scanDirFullPath($this->input);

        return $files;
    }

    /**
     * @return ReadObserver
     */
    public function getObserver()
    {
        return $this->observer;
    }
}