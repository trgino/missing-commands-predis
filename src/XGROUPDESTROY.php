<?php

namespace MissingPredis;

class XGROUPDESTROY extends \Predis\Command\Command
{
    public function getId()
    {
        return 'XGROUP DESTROY';
    }

    public function setArguments(array $arguments)
    {
        $args = [];
        $args[] = $arguments[0]; //steamname
        $args[] = $arguments[1]; //group

        parent::setArguments($args);
    }
}
