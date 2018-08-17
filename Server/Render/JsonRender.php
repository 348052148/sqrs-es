<?php
namespace Server\Render;

use Server\Response;

class JsonRender {
    private $response;
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function render($data){
        $this->response->header('ContentType','application/json; charset=utf-8');

        $this->response->responseContent(json_encode($data));
    }
}