<?php
namespace Event;

class EventBus {
    private $eventEngine;

    public function __construct($eventEngine)
    {
        $this->eventEngine = $eventEngine;
    }

    public function register($eventSource){

        $clf = new \ReflectionClass($eventSource);
        $methods = $clf->getMethods();
        foreach ($methods as $method){
            if(preg_match('/^on/',$method->getName())){
                $this->eventEngine->listen(str_replace('on','',$method->getName()),[$eventSource,$method->getName()]);
            }
        }

        $eventSource->setEventGateway(new EventGateway($this));

    }

    public function trigger($event){
        $this->eventEngine->trigger($event);
    }
}