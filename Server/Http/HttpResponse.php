<?php
namespace Server\Http;

class HttpResponse {
    private $response;
    public function __construct($response)
    {
        $this->response = $response;
    }

    public function header($name,$value){
        $this->response->header($name ,$value);
    }

    public function cookie($key,$value,$expire){
        //cookie($key,$value = '',$expire = 0 , $path = '/', $domain  = '', bool $secure = false , bool $httponly = false);
        $this->response->cookie($key,$value ,$expire);
    }

    public function responseStatus($status){
        $this->response->status($status);
    }

    public function redirect($url){
        $this->response->redirect($url);
    }

    public function writeData($data){
        $this->response->write($data);
    }

    public function responseContent($data){
        $this->response->end($data);
    }
}