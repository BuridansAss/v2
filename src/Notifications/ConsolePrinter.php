<?php


namespace KissTools\Notifications;


use KissTools\Notifications\Formatter\Formatter;

class ConsolePrinter
{
    /**
     * @var Formatter
     */
    private $format;

    /**
     * @var ConsolePrinter
     */
    private static $instant;

    /**
     * ConsolePrinter constructor.
     */
    public function __construct()
    {
        $this->format = Formatter::create();
    }

    /**
     * @param $message string
     */
    public function badMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::RED)
            ->printLn();
    }

    /**
     * @param $message string
     */
    public function goodMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::GREEN)
            ->printLn();
    }

    /**
     * @param $message string
     */
    public function neutralMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::WHITE)
            ->printLn();
    }

    /**
     * @param $message
     */
    public function infoMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::YELLOW)
            ->printLn();
    }

    /**
     *  separate lines
     */
    public function separator() : void
    {
        $this->format
            ->setMessage('**************************************')
            ->setFontColor(Formatter::VIOLET)
            ->printLn();
    }

    /**
     * @param $message
     */
    public static function exceptionExitFromApp($message) : void
    {
        $cp = new self();

        $cp->badMessage($message);
        die();
    }

    /**
     * @return bool
     */
    private static function isInstant() : bool
    {
        return isset(self::$instant);
    }

    /**
     * @return ConsolePrinter
     */
    private static function createInstantIfNeed() : ConsolePrinter
    {
        if (!self::isInstant()) {
            self::$instant = new self();
        }

        return self::$instant;
    }

    /**
     * @param $message
     */
    public static function staticGoodMessage($message) : void
    {
        self::createInstantIfNeed();

        self::$instant->goodMessage($message);
    }

    /**
     * @param $message
     */
    public static function staticBadMessage($message) : void
    {
        self::createInstantIfNeed();

        self::$instant->badMessage($message);
    }

    /**
     * @param $message
     */
    public static function staticNeutralMessage($message) : void
    {
        self::createInstantIfNeed();

        self::$instant->neutralMessage($message);
    }

    /**
     * separator
     */
    public static function staticSeparator() : void
    {
        self::createInstantIfNeed();

        self::$instant->separator();
    }

    /**
     * @param $message
     */
    public static function staticInfoMessage($message) : void
    {
        self::createInstantIfNeed();

        self::$instant->infoMessage($message);
    }
}