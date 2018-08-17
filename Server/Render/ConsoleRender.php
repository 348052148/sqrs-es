<?php
namespace Server\Render;

use Server\Response;

class ConsoleRender {
    private $response;
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function render($data){

        $this->response->responseContent(json_encode($data));
    }
}