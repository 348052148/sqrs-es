<?php
namespace Server;

use Server\Console\ConsoleParame;
use Server\Console\ConsoleRequest;
use Server\Console\ConsoleResponse;
use Server\Event\RequestPostEvent;
use Server\Handle\DisruptorHandle;
use Server\Handle\RenderHandle;
use Server\Handle\RequestHandle;
use Server\Handle\RouteHandle;

class ConsoleServer extends Server {
    private $http;
    private $eventBus;
    private $eventGateway;
    public function __construct()
    {

    }

    public function setEventBus($eventBus){
        $this->eventBus = $eventBus;
    }

    private function initEvent(){
        $this->http = new ConsoleParame();
        //1.请求
        $this->eventBus->register(new RequestHandle());
        //2. HTTP 路由处理器可以选择何种规则路由
        $this->eventBus->register(new RouteHandle());
        //
        $this->eventBus->register(new DisruptorHandle());
        //3. http 渲染处理器可以选择如何渲染
        $this->eventBus->register(new RenderHandle());
    }

    public function start(){
        $this->initEvent();

        $this->http->parse(function (){
            $consoleRequest = new ConsoleRequest();

            $consoleResponse = new ConsoleResponse();

            $this->eventBus->trigger(new RequestPostEvent($consoleRequest,$consoleResponse));
        });

    }
}