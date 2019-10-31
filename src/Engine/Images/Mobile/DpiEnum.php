<?php


namespace KissTools\Engine\Images\Mobile;


class DpiEnum
{
    const GAIN_MDPI = 1;
    const GAIN_LDPI = 0.75;
    const GAIN_HDPI = 1.5;
    const GAIN_XHDPI = 2;
    const GAIN_XXHDPI = 3;
    const GAIN_XXXHDPI = 4;
    const GAIN_X1 = self::GAIN_MDPI;
    const GAIN_X2 = self::GAIN_XHDPI;
    const GAIN_X3 = self::GAIN_XXHDPI;

    const NAME_MDPI    = 'mdpi.png';
    const NAME_LDPI    = 'ldpi.png';
    const NAME_HDPI    = 'hdpi.png';
    const NAME_XHDPI   = 'xhdpi.png';
    const NAME_XXHDPI  = 'xxhdpi.png';
    const NAME_XXXHDPI = 'xxxhdpi.png';
    const NAME_1X      = '1x.png';
    const NAME_2X      = '2x.png';
    const NAME_3X      = '3x.png';
}