<?php

namespace MissingPredis;

class XGROUPDELCONSUMER extends \Predis\Command\Command
{
    public function getId()
    {
        return 'XGROUP DELCONSUMER';
    }

    public function setArguments(array $arguments)
    {
        $args = [];
        $args[] = $arguments[0]; //steamname
        $args[] = $arguments[1]; //group
        $args[] = $arguments[2]; //consumername

        parent::setArguments($args);
    }
}
