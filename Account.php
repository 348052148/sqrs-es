<?php

/**
 * command 规则 和 event 之后可以使用注解实现
 */
class Account extends \Domain\AbstractAggregate {

    function handleCreateOrderCommand($command)
    {
        var_dump('ZHIXING-COMMAND');
        $this->apply(new CreateOrderEvent());
    }

    function onCreateOrderEvent($event)
    {
        var_dump($event);
    }
}