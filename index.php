<?php
//$http = new swoole_http_server("0.0.0.0", 8080);
//
//$http->on('request', function ($request, $response) {
//    var_dump($request->get, $request->post);
//    $response->header("Content-Type", "text/html; charset=utf-8");
//    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
//});
//
//$http->start();
/**
 * 1 命令
 * 1.1 命令bus
 * 2 查询
 * 2 查询bus
 * 3 事件
 * 3.1 事件bus
 * 3.2 事件store
 * 3.3 事件回溯
 * 4 聚合根
 * 5 实体
 * 6 持久化
 * 
 */

define('DS', DIRECTORY_SEPARATOR);
function autoLoader($class){
    $baseClasspath = \str_replace('\\', DS, $class) . '.php';
    //var_dump($baseClasspath);
    require "{$baseClasspath}";
}

spl_autoload_register('autoLoader');

$config = new \Bootstrap\Configure();
$config->configureAggregate(Account::class);
$config->configureServer(\Server\ConsoleServer::class);
$config->buildConfiguration();
$config->start();

//var_dump($config->commandGateway());

//$config->commandGateway()->send(new CreateOrderCommand());