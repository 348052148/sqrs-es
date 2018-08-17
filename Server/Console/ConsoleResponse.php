<?php
namespace Server\Console;

use Server\Response;

class ConsoleResponse implements Response {

    public function header($name, $value)
    {

    }

    public function cookie($key, $value, $expire)
    {

    }

    public function redirect($url)
    {

    }

    public function responseStatus($status)
    {

    }

    public function writeData($data)
    {
        echo  $data;
    }

    public function responseContent($data)
    {
        echo  $data;
    }
}