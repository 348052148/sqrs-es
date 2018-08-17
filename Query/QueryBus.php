<?php
namespace Query;
class QueryBus {
    private $queryEntitys = [];

    public function register($queryEntiys){
        $clf = new \ReflectionClass($queryEntiys);
        $methods = $clf->getMethods();
        foreach ($methods as $method){
            if(preg_match('/^handle/',$method->getName())){
                $this->queryEntitys[$method->getName()] = $queryEntiys;
            }
        }
    }

    public function trigger($query){

        call_user_func_array([
            $this->queryEntitys['handle'.get_class($query)],'handle'.get_class($query)
        ],[$query]);

    }
}