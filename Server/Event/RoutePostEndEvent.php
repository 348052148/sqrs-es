<?php
namespace Server\Event;
class RoutePostEndEvent {
    private $request;
    private $response;
    private $routeEngine;

    public function __construct($request,$response,$routeEngine)
    {
        $this->request = $request;
        $this->response = $response;
        $this->routeEngine = $routeEngine;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getResponse(){
        return $this->response;
    }

    public function getRouteEngine(){
        return $this->routeEngine;
    }
}