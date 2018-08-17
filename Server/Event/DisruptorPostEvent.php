<?php
namespace Server\Event;

class DisruptorPostEvent {
    private $request;
    private $response;
    private $controller;
    private $action;
    private $parames;

    public function __construct($request,$response,$controller,$action,$parames=[])
    {
        $this->request = $request;
        $this->response = $response;

        $this->controller = $controller;
        $this->action = $action;
        $this->parames = $parames;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getResponse(){
        return $this->response;
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParames(){
        return $this->parames;
    }
}