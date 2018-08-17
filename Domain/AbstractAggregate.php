<?php

namespace Domain;

use EventStore\EventStore;
use EventStore\FileEventEngine;

abstract class AbstractAggregate {
    private $eventGateway;
    private $eventStore;

    public function __construct()
    {
        $this->eventStore = new EventStore(new FileEventEngine());
        //$this->repository = new
    }

    public function setEventGateway($eventGateway){
        $this->eventGateway = $eventGateway;
    }
    /**
     * command handler
     */
    function handle($command){

    }

    /**
     * apply event
     */
    protected function apply($event){
        $this->eventGateway->apply($event);
    }

    /**
     * event handler
     */
     function on($event){

     }
}