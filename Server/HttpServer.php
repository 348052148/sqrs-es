<?php
namespace Server;

use Server\Event\RequestPostEvent;
use Server\Handle\DisruptorHandle;
use Server\Handle\RenderHandle;
use Server\Handle\RequestHandle;
use Server\Handle\RouteHandle;
use Server\Http\HttpRequest;
use Server\Http\HttpResponse;

class HttpServer extends Server {
    private $http;
    private $eventBus;
    private $port;
    private $eventGateway;
    public function __construct()
    {

    }

    public function setPort($port){
        $this->port = $port;
    }

    public function setEventBus($eventBus){
        $this->eventBus = $eventBus;
    }

    private function initEvent(){
        $this->http = new \swoole_http_server("0.0.0.0", $this->port);

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

        $this->http->on('request', function ($request, $response) {

            $httpRequest = new HttpRequest($request);

            $httpResponse = new HttpResponse($response);

            $this->eventBus->trigger(new RequestPostEvent($httpRequest,$httpResponse));
        });

        $this->http->start();
    }

}