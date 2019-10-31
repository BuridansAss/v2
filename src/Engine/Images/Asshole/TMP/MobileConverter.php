<?php


namespace KissTools\Engine\Images\Asshole\TMP;



use KissTools\Engine\Images\Canvas;
use KissTools\Engine\Images\Mobile\DpiEnum;
use KissTools\Engine\Images\Picture;
use KissTools\Engine\Images\Picture\Original;
use KissTools\Engine\Images\Picture\Transformed;

class MobileConverter
{
    public static function create($path, $whereSave)
    {
        $picture = Original::takeImageFromPicture($path);

        $width = $picture->getWidth();
        $height = $picture->getHeight();

        self::createNewImage($picture, $whereSave . DpiEnum::NAME_XXXHDPI);//xxxhpi

        $gain = DpiEnum::GAIN_XXHDPI/DpiEnum::GAIN_XXXHDPI;

        $pictureTr = Transformed::copy($picture)->setWidth((int) ($width * $gain))->setHeight((int) ($height * $gain));
        $pictureTr->transform();
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_XXHDPI);
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_3X);
        unset($pictureTr);


        $gain = DpiEnum::GAIN_XHDPI/DpiEnum::GAIN_XXXHDPI;
        $pictureTr = Transformed::copy($picture)->setWidth((int) ($width * $gain))->setHeight((int) ($height * $gain));
        $pictureTr->transform();
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_XHDPI);
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_2X);
        unset($pictureTr);

        $gain = DpiEnum::GAIN_HDPI/DpiEnum::GAIN_XXXHDPI;
        $pictureTr = Transformed::copy($picture)->setWidth((int) ($width * $gain))->setHeight((int) ($height * $gain));
        $pictureTr->transform();
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_HDPI);
        unset($pictureTr);

        $gain = DpiEnum::GAIN_MDPI/DpiEnum::GAIN_XXXHDPI;
        $pictureTr = Transformed::copy($picture)->setWidth((int) ($width * $gain))->setHeight((int) ($height * $gain));
        $pictureTr->transform();
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_MDPI);
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_1X);
        unset($pictureTr);

        $gain = DpiEnum::GAIN_LDPI/DpiEnum::GAIN_XXXHDPI;
        $pictureTr = Transformed::copy($picture)->setWidth((int) ($width * $gain))->setHeight((int) ($height * $gain));
        $pictureTr->transform();
        self::createNewImage($pictureTr, $whereSave . DpiEnum::NAME_LDPI);
        unset($pictureTr);

    }


    public static function createNewImage(Picture $picture, $savePath)
    {
        Canvas::init()
              ->setFormat('png')
              ->setWidth($picture->getWidth())
              ->setHeight($picture->getHeight())
              ->create()
              ->drawImage($picture, 0 ,0)
              ->save($savePath);
    }
}