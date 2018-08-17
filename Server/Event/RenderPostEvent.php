<?php
namespace Server\Event;
class RenderPostEvent {
    private $request;
    private $response;
    private $data;

    public function __construct($request,$response,$data)
    {
        $this->request = $request;
        $this->response = $response;
        $this->data = $data;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getResponse(){
        return $this->response;
    }

    public function getData(){
        return $this->data;
    }
}