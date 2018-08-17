<?php
namespace Server\Handle;


use Server\Disruptor\SimpleDisruptor;
use Server\Event\DisruptorPostEndEvent;
use Server\Event\DisruptorPostEvent;
use Server\Event\RenderPostEvent;

class DisruptorHandle {

    private $eventGateway;

    public function setEventGateway($eventGateway){
        $this->eventGateway = $eventGateway;
    }

    /**
     * 控制器配置规则。比如控制器的命名空间。或者存放目录 这里默认 Controller 控制器后缀 默认 Controller
     */
    public function onDisruptorPostEvent(DisruptorPostEvent $event){
        $class = 'Controller\\'.$event->getController()."Controller";

        if(!class_exists($class)) throw  new \Exception('Controller Not found');

        $clf = new \ReflectionClass($class);

        if(!$clf->getMethod($event->getAction())) throw  new \Exception('Action Not found');



        $this->eventGateway->apply(new DisruptorPostEndEvent(
            $event->getRequest(),
            $event->getResponse(),
            new SimpleDisruptor($clf->newInstanceArgs([]),$event->getAction(),$event->getParames()))
        );
    }

    public function onDisruptorPostEndEvent(DisruptorPostEndEvent $event){
        $disruptor = $event->getDisruptor();
        $this->eventGateway->apply(new RenderPostEvent($event->getRequest(),$event->getResponse(),$disruptor->exec()));
    }
}