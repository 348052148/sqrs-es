<?php
namespace Server\Event;

class RequestPostEvent {
    private $request;
    private $response;

    public function __construct($request,$response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getResponse(){
        return $this->response;
    }
}