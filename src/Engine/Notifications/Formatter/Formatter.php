<?php


namespace KissTools\Engine\Notifications\Formatter;


class Formatter
{
    const WHITE    = '0';
    const RED      = '1';
    const GREEN    = '2';
    const YELLOW   = '3';
    const BLUE     = '4';
    const VIOLET   = '5';
    const W_BLUE   = '6';
    const GREY     = '7';
    const USUAL    = '8';


    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $fontColor;

    /**
     * @var string
     */
    private $bgColor;

    /**
     * @var array
     */
    private static $fontColorMap = [
        self::WHITE  => ';3' . self::WHITE,
        self::RED    => ';3' . self::RED,
        self::GREEN  => ';3' . self::GREEN,
        self::YELLOW => ';3' . self::YELLOW,
        self::BLUE   => ';3' . self::BLUE,
        self::VIOLET => ';3' . self::VIOLET,
        self::W_BLUE => ';3' . self::W_BLUE,
        self::GREY   => ';3' . self::GREY,
        self::USUAL  => ';3' . self::USUAL,
    ];

    /**
     * @var array
     */
    private static $bgColorMap = [
        self::WHITE  => ';4' . self::WHITE,
        self::RED    => ';4' . self::RED,
        self::GREEN  => ';4' . self::GREEN,
        self::YELLOW => ';4' . self::YELLOW,
        self::BLUE   => ';4' . self::BLUE,
        self::VIOLET => ';4' . self::VIOLET,
        self::W_BLUE => ';4' . self::W_BLUE,
        self::GREY   => ';4' . self::GREY,
        self::USUAL  => ';4' . self::USUAL,
    ];

    /**
     * Formatter constructor.
     */
    protected final function __construct()
    {

    }

    /**
     * @return Formatter
     */
    public static function create() : Formatter
    {
        return new self();
    }

    /**
     * @param $message string
     * @return Formatter
     */
    public function setMessage($message) : Formatter
    {
        $this->message = 'm' . $message;
        return $this;
    }

    /**
     * @param $color string
     * @return Formatter
     */
    public function setFontColor($color) : Formatter
    {
        $this->fontColor = self::getFontColor($color);
        $this->message   = $this->fontColor . $this->message;

        return $this;
    }

    /**
     * @param $color string
     * @return Formatter
     */
    public function setBgColor($color) : Formatter
    {
        $this->bgColor = self::getBgColor($color);
        $this->message = $this->bgColor . $this->message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return "\33[01" . $this->message . "\33[0m";
    }

    /**
     * print message and set pointer on new line
     */
    public function printLn() : void
    {
        echo "\33[01" . $this->message . "\33[0m" . PHP_EOL;
    }

    /**
     * @param $colorId string
     * @return string
     */
    private static function getFontColor($colorId) : string
    {
        if (isset(self::$fontColorMap[$colorId])) {
            return self::$fontColorMap[$colorId];
        }

        return self::$fontColorMap[self::USUAL];
    }

    /**
     * @param $colorId string
     * @return string
     */
    private static function getBgColor($colorId) : string
    {
        if (isset(self::$bgColorMap[$colorId])) {
            return self::$bgColorMap[$colorId];
        }

        return self::$bgColorMap[self::USUAL];
    }
}