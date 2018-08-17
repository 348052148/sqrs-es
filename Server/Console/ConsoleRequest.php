<?php
namespace Server\Console;

use Server\Request;

class ConsoleRequest implements Request {

    public function cookie($name, $def = null)
    {

    }

    public function files()
    {

    }

    public function get($name, $def = null)
    {
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
    }

    public function getData()
    {

    }

    public function getParame($name, $def = null)
    {
        if(isset($_ENV[$name])){
            return $_ENV[$name];
        }
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
        return $def;
    }

    public function header($name, $def = null)
    {

    }

    public function post($name, $def = null)
    {

    }

    public function __get($name)
    {
        return $this->getParame($name);
    }
}