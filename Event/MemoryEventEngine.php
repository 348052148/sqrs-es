<?php
namespace Event;

class MemoryEventEngine {
    private $events = [];

    public function listen($event,$callback){
        $this->events[$event] = $callback;
    }

    public function trigger($event,$args=[]){
        array_push($args,$event);
        try {
            if (is_object($event)) {
                $names = explode('\\',get_class($event));
                $event = array_pop($names);
            }
            call_user_func_array($this->events[$event], $args);


        }catch (\Exception $e){
            //var_dump($this->events[$event]);
            var_dump($e->getMessage());
        }
    }
}