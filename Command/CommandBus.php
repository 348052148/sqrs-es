<?php
namespace Command;

class CommandBus {
    private $commandEntitys = [];

    public function register($commandEntiys){
        $clf = new \ReflectionClass($commandEntiys);
        $methods = $clf->getMethods();
        foreach ($methods as $method){
           if(preg_match('/^handle/',$method->getName())){
               $this->commandEntitys[$method->getName()] = $commandEntiys;
           }
        }
    }

    public function trigger($command){

        call_user_func_array([
            $this->commandEntitys['handle'.get_class($command)],'handle'.get_class($command)
        ],[$command]);

    }
}