<?php
namespace Server;

interface Response {

    public function header($name,$value);

    public function cookie($key,$value,$expire);

    public function responseStatus($status);

    public function redirect($url);

    public function writeData($data);

    public function responseContent($data);
}