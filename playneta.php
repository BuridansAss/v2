<?php

include 'vendor/autoload.php';


use KissTools\Engine\Notifications\ConsolePrinter;
use KissTools\SplitArgs;


$commands = SplitArgs::getArgs($argv);

if (count($commands) === 1 && $commands[1] === 'init') {
    init();
}

function init() : void {
    ConsolePrinter::staticSeparator();

    ConsolePrinter::staticNeutralMessage('Создание проекта:');

    ConsolePrinter::staticInfoMessage( 'Введите новый путь,');
    ConsolePrinter::staticInfoMessage('где развернется tool проект,');
    ConsolePrinter::staticInfoMessage('(путь должен быть полным).');
    ConsolePrinter::staticInfoMessage('Не ставь в конце разделитель а то пожрешь говна!!!');
    ConsolePrinter::staticInfoMessage('Не делай это на Винде. а то пожрешь говна!!!');

    $pathToApp = readline();
    $name = createApp($pathToApp);

    ConsolePrinter::staticSeparator();
    ConsolePrinter::staticGoodMessage('Создается проект ' . $name);

    createProjectStructure($name);

    ConsolePrinter::staticSeparator();
}

function createApp($appPath) : string {
    $projectName = $appPath . '/KissTools';

    if (is_dir($projectName)) {
        $projectName = $projectName . 'v2';
        mkdir($projectName, 0777, true);
    } else {
        mkdir($projectName, 0777, true);
    }

    return $projectName;
}

function isYseAnswer($string) : bool {
    $no =  ['нет', 'н', 'no' , 'n'];

    if (in_array($string, $no)) {
        return false;
    }

    return true;

}

function createProjectStructure($name) {
    mkdir($name . '/static/game/assets/hats/animated/images', 0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/assets/hats/animated/images');

    mkdir($name . '/static/game/images/collection' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/images/collection');

    mkdir($name . '/static/game/images/gifts' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/images/gifts');

    mkdir($name . '/static/game/images/gifts/en_US/small' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/images/gifts/en_US/small');

    mkdir($name . '/static/game/images/gifts/en_US/large' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/images/gifts/en_US/large');

    mkdir($name . '/static/game/images/gifts/large' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/images/gifts/large');

    mkdir($name . '/static/game/images/gifts/small' ,0777, true);
    ConsolePrinter::staticGoodMessage('Cоздал: ' . $name . '/static/game/assets/hats/animated/images/');
}
