<?php
namespace Server\Handle;

use Server\Event\DisruptorPostEvent;
use Server\Event\RoutePostEndEvent;
use Server\Route\SimpleRoute;

class RouteHandle{

    private $eventGateway;

    public function setEventGateway($eventGateway){
        $this->eventGateway = $eventGateway;
    }

    /**
     * 主要做路由器选择和配置
     */
    public function onRoutePostEvent($event){
        $routeEngine = new SimpleRoute($event->getRequest());
        $this->eventGateway->apply(new RoutePostEndEvent($event->getRequest(),$event->getResponse(),$routeEngine));
    }

    /**
     * 将过滤好的路由转发
     */
    public function onRoutePostEndEvent($event){
        $routeEngine = $event->getRouteEngine();
        $routeEngine->mapping();
        $this->eventGateway->apply(new DisruptorPostEvent($event->getRequest(),$event->getResponse(),$routeEngine->getController(),$routeEngine->getAction(),$routeEngine->getParames()));
    }
}