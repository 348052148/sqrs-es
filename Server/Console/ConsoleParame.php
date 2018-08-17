<?php
namespace Server\Console;

class ConsoleParame {

    public function __construct()
    {

    }

    public function parse($callback){
        $longopt = array(
            'route:',
            'parame:'
        );
        $param = getopt('', $longopt);

        $_GET['s'] = $param['route'];

//        foreach (explode('&',$param['parame']) as $p){
//            $kv = explode('=',$p);
//            $_GET[$kv[0]] = $kv[1];
//        }

        $callback();
    }
}