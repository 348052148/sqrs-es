<?php
namespace Server;

interface Request {

    public function getParame($name,$def=null);

    public function header($name,$def=null);

    public function post($name,$def=null);

    public function get($name,$def=null);

    public function cookie($name,$def=null);

    public function files();

    public function getData();
    
}