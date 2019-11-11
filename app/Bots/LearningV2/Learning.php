<?php


namespace App\Bots\LearningV2;


use App\Bots\LearningV2\Csv\Bus;
use KissTools\ConfigHelper;
use KissTools\Engine\Text\Descriptors\ReadDescriptor;

class Learning
{
    private static $init;

    private static $bus;

    public static function start()
    {
        self::$init = new Init();
        self::$bus = new Bus();

        self::$init->getObserver()->addReadListener(self::$bus);
    }

}