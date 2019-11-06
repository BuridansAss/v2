<?php


namespace KissTools\Engine\Text;


abstract class AbstractDescriptor
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var resource
     */
    protected $handler;

    /**
     * AbstractDescriptor constructor.
     * @param $path
     */
    protected function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return resource
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return void
     */
    public function close() : void
    {
        fclose($this->handler);
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return $this->path;
    }
}