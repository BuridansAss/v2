<?php

include 'vendor/autoload.php';


use KissTools\Notifications\ConsolePrinter;
use KissTools\SplitArgs;


$commands = SplitArgs::getArgs($argv);

if (count($commands) === 1 && $commands[1] === 'init') {
    init();
}

function init() : void {
    ConsolePrinter::staticSeparator();

    ConsolePrinter::staticNeutralMessage('Создание проекта:');

    ConsolePrinter::staticInfoMessage('Введите новый путь, где развернется tool проект, (путь должен быть полным)');
    $rootAppPath = fgets(STDIN);
    createApp($rootAppPath);

    ConsolePrinter::staticSeparator();

    $line = fgets(STDIN);
    echo $line;
}


function createApp($appPath) : void {
    if (is_dir($appPath)) {
        ConsolePrinter::staticInfoMessage('Такая папка уже существует, размещаем в ней?');

        $answer = fgets(STDIN);

        while (!isYseAnswer($answer)) {
            ConsolePrinter::staticInfoMessage('Введите другой путь');

            $appPath = fgets(STDIN);

            if (is_dir($appPath)) {
                ConsolePrinter::staticInfoMessage('Такая папка уже существует, размещаем в ней?');

                $answer = fgets(STDIN);

                if (!isYseAnswer($answer)) {
                    continue;
                }
            }

        }

        createProjectStructure();
    }
}

function isYseAnswer($string) : bool {
    $no =  ['нет', 'н', 'no' , 'n'];

    if (in_array($string, $no)) {
        return false;
    }

    return true;

}

function createProjectStructure() {
    ConsolePrinter::staticGoodMessage('CreatingProject');
}
