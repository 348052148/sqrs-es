<?php

namespace Bootstrap;

use Command\CommandBus;
use Command\CommandGateway;
use Event\EventBus;
use Event\MemoryEventEngine;
use Query\QueryGateway;

class Configure {

    private $aggregateList = [];

    private $commandBus;

    private $queryBus;

    private $eventBus;

    private $server;

    public function configureAggregate($aggregate){
        $clf = new \ReflectionClass($aggregate);
        array_push($this->aggregateList,$clf->newInstanceArgs([]));
        return $this;
    }

    /**
     * 配置事件仓库
     */
    public function configureEmbeddedEventStore(){

        return $this;
    }

    /**
     * 配置命令bus
     */
    public function configureCommandBus(){

        return $this;
    }

    public function configureQueryBus(){

        return $this;
    }

    public function configureEventBus(){

        return $this;
    }

    /**
     * 配置server
     */
    public function configureServer($serverClass){
        $serverClf = new \ReflectionClass($serverClass);
        $this->server = $serverClf->newInstanceArgs([]);
    }

    /**
     * 托管，用于ioc
     */
    public function configureTrust(){

    }

    /**
     * 获取命令网关
     */
    public function commandGateway(){
        return new CommandGateway($this->commandBus);
    }

    /**
     * 获取query网关
     */
    public function queryGateway(){
        return new QueryGateway($this->queryBus);
    }


    /**
     * 生成配置项
     */
    public function buildConfiguration(){
        //注册聚合根到命令bus
        $this->commandBus = new CommandBus();
        //
        $this->eventBus = new EventBus(new MemoryEventEngine());
    }

    public function start(){

        foreach ($this->aggregateList as $aggregate){
            $this->commandBus->register($aggregate);
            $this->eventBus->register($aggregate);
        }

        //开启server
        $this->server->setEventBus($this->eventBus);
        $this->server->start();

    }
}