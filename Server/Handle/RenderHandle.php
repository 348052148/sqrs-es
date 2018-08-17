<?php

namespace Server\Handle;

use Server\Event\RenderPostEndEvent;
use Server\Event\RenderPostEvent;
use Server\Render\JsonRender;

class RenderHandle{

    private $eventGateway;

    public function setEventGateway($eventGateway){
        $this->eventGateway = $eventGateway;
    }

    /**
     * 进行渲染
     */
    public function onRenderPostEndEvent(RenderPostEndEvent $event){
        $renderEngine = $event->getRenderEngine();

        $renderEngine->render($event->getData());
    }

    /**
     * 目的是选择合适的渲染引擎 可配置
     */
    public function onRenderPostEvent(RenderPostEvent $event){
        $renderEngine = new JsonRender($event->getResponse());
        $this->eventGateway->apply(new RenderPostEndEvent($renderEngine,$event->getData()));
    }
}

