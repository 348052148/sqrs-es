<?php
namespace EventStore;

class FileEventEngine {

    public function write($event){
        $eventName = get_class($event);
        file_put_contents("eventStore{$eventName}.store",serialize($event));
    }

    public function read(){

    }

    public function readAll(){

    }

}