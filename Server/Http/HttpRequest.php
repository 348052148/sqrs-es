<?php
namespace Server\Http;

class HttpRequest {
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getParame($name,$def=null){
        if(isset($this->request->get[$name])){
            return $this->request->get[$name];
        }
        if(isset($this->request->post[$name])){
            return $this->request->post[$name];
        }
        if(isset($this->request->cookie[$name])){
            return $this->request->cookie[$name];
        }
        return $def;
    }

    public function header($name,$def=null){
        if(isset($this->request->header[$name])) {
            return $this->request->header[$name];
        }
        return $def;
    }

    public function post($name,$def=null){
        if(isset($this->request->post[$name])){
            return $this->request->post[$name];
        }
        return $def;
    }

    public function get($name,$def=null){
        if(isset($this->request->get[$name])){
            return $this->request->get[$name];
        }
        return $def;
    }

    public function cookie($name,$def=null){
        if(isset($this->request->cookie[$name])){
            return $this->request->cookie[$name];
        }
        return $def;
    }

    public function files(){
        return $this->request->files;
    }

    public function getData(){
        return $this->request->rawContent;
    }

    public function __get($name)
    {
        return $this->getParame($name);
    }
}