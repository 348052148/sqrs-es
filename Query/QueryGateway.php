<?php
namespace Query;
class QueryGateway {
    private $queryBus;
    public function __construct($queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function send($query,$queryBack=null){
        $this->queryBus->trigger($query);
    }

    public function sendAndWait($command,$timeout=1000){

    }
}