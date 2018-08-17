<?php
namespace Server\Route;

use Server\Request;

class SimpleRoute {
    private $request;
    private $key = 's';
    private $controller;
    private $action;
    private $parames;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function mapping(){
        $urlPath = $this->request->get($this->key,'index/index');

        $urlParseArray = explode('/',$urlPath);

        while(empty($urlParseArray[0])){
            array_shift($urlParseArray);
        }

        if(count($urlParseArray)<2){
            throw new \Exception('路由错误');
        }

        $this->controller = $urlParseArray[0];
        array_shift($urlParseArray);
        $this->action = $urlParseArray[0];
        array_shift($urlParseArray);
        $this->parames = $urlParseArray;
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