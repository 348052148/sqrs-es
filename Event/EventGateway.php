<?php
namespace Event;

class EventGateway {
    private $eventBus;
    public function __construct($eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function apply($event){
        $this->eventBus->trigger($event);
    }
}