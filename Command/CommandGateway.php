<?php
namespace Command;

class CommandGateway {
    private $commandBus;
    public function __construct($commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function send($command,$commandBack=null){
        $this->commandBus->trigger($command);
    }
    public function sendAndWait($command,$timeout=1000){

    }
}