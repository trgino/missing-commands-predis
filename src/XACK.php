<?php

namespace MissingPredis;

class XACK extends \Predis\Command\Command
{
    public function getId()
    {
        return 'XACK';
    }

    public function setArguments(array $arguments)
    {
        $args = [];
        $args[] = $arguments[0]; //streamname
        $args[] = $arguments[1]; //group
        $args[] = $arguments[2]; //messageid

        parent::setArguments($args);
    }
}
