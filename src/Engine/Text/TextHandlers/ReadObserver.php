<?php


namespace KissTools\Engine\Text\TextHandlers;


class ReadObserver
{
    /**
     * @var ReadListener[]
     */
    private $listeners;

    /**
     * @param ReadListener $listener
     */
    public function addReadListener(ReadListener $listener) : void
    {
        $this->listeners[] = $listener;
    }

    /**
     * рассылает событие слушателям
     * @param $args
     */
    public function sendEvent($args) : void
    {
        foreach ($this->listeners as $listener) {
            $listener->doIt($args);
        }
    }
}