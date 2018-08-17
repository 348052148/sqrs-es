<?php
namespace Server\Disruptor;

class SimpleDisruptor {
    private $instance;
    private $method;
    private $parames;

    public function __construct($instance,$method,$parames)
    {
        $this->instance = $instance;
        $this->method = $method;
        $this->parames = $parames;
    }

    public function exec(){
       return call_user_func_array([
            $this->instance,
            $this->method
        ],$this->parames);
    }
}