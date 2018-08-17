<?php
namespace Server\Event;

class RenderPostEndEvent {
    private $renderEngine;
    private $request;
    private $response;
    private $data;

    public function __construct($renderEngine,$data)
    {
        $this->renderEngine = $renderEngine;
        $this->data = $data;
    }

    public function getRenderEngine(){
        return $this->renderEngine;
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