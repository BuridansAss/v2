<?php

require '../vendor/autoload.php';

use App\Bots\Learning\Text\Handlers\CsvMessageParser;
use KissTools\Engine\Text\Descriptors\ReadDescriptor;

$bootstrap = require 'bootstrap.config.php';




//441 475
//861 895

//$pictures = range(441, 475);
//
//$dpis = ['1x/', '2x/', '3x/', 'hdpi/', 'ldpi/', 'mdpi/', 'xhdpi/', 'xxhdpi/', 'xxxhdpi/'];
//
//$big = './stickers/big/';
//$regular = './stickers/regular/';
//
//$i = 861;
//foreach ($pictures as $picture)
//{
//    foreach ($dpis as $dpi) {
//        copy($big . $dpi . $picture . '.png', $regular . $dpi . $i . '.png');
//    }
//
//    $i++;
//}

//$background = '/home/evgen/Prjs/kiss-tools/app/background/';
//
//\KissTools\Engine\Images\Asshole\TMP\MobileConverter::create('/home/evgen/Prjs/kiss-tools/app/popup.png', $background);


//$cr = new CsvMessageParser();
//$desc = ReadDescriptor::create('/home/evgen/Загрузки/Messenger Test.csv');
//$cr->handle($desc);
//
//$cw = new \App\Bots\Learning\Text\Handlers\CsvBaseCreator();
//$wdesc = \KissTools\Engine\Text\Descriptors\WriteDescriptor::create('/home/evgen/Загрузки/Test.csv');
//$cw->setLine(['hui', 'pizda']);
//$cw->handle($wdesc);
//$wdesc->close();

//(new \App\Bots\Learning\CsvBusByMentorWardDialog('/home/evgen/Загрузки/botMessages'))->read();

