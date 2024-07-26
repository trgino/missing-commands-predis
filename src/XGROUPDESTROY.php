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

    /**
     * @param  array $arguments
     * @return void
     */
    private function setCreateArguments(array $arguments): void
    {
        $processedArguments = [$arguments[0], $arguments[1], $arguments[2], $arguments[3]];

        if (array_key_exists(4, $arguments) && true === $arguments[4]) {
            $processedArguments[] = 'MKSTREAM';
        }

        if (array_key_exists(5, $arguments)) {
            array_push($processedArguments, 'ENTRIESREAD', $arguments[5]);
        }

        parent::setArguments($processedArguments);
    }

    /**
     * @param  array $arguments
     * @return void
     */
    private function setSetIdArguments(array $arguments): void
    {
        $processedArguments = [$arguments[0], $arguments[1], $arguments[2], $arguments[3]];

        if (array_key_exists(4, $arguments)) {
            array_push($processedArguments, 'ENTRIESREAD', $arguments[4]);
        }

        parent::setArguments($processedArguments);
    }
}
