<?php
namespace Server\Event;

class DisruptorPostEndEvent {
    private $request;
    private $response;
    private $controller;
    private $action;
    private $parames;
    private $disruptor;

    public function __construct($request,$response,$disruptor)
    {
        $this->request = $request;
        $this->response = $response;
        $this->disruptor = $disruptor;
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

    public function getDisruptor(){
        return $this->disruptor;
    }
}