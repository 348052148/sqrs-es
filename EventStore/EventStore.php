<?php
namespace EventStore;

class EventStore {
    private $persistentEngine;

    public function __construct($persistentEngine)
    {
        $this->persistentEngine = $persistentEngine;
    }

    public function take(){
        return $this->persistentEngine->read();
    }

    public function takeAll(){
        return $this->persistentEngine->readAll();
    }

    public function put($event){
        $this->persistentEngine->write($event);
    }
}