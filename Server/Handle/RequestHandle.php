<?php
namespace Server\Handle;

use Server\Event\RequestPostEvent;
use Server\Event\RoutePostEvent;

class RequestHandle {
    private $eventGateway;

    public function setEventGateway($eventGateway){
        $this->eventGateway = $eventGateway;
    }

    /**
     * 做请求进入之前的一些处理 比如  filter 过滤链
     */
    public function onRequestPostEvent(RequestPostEvent $event){

        $this->eventGateway->apply(new RoutePostEvent($event->getRequest(),$event->getResponse()));
    }
}