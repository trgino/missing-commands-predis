<?php

namespace MissingPredis;

class XPENDING extends \Predis\Command\Command
{
    public function getId()
    {
        return 'XPENDING';
    }

    public function setArguments(array $arguments)
    {
        $args = [];
        $args[] = $arguments[0]; //streamname
        $args[] = $arguments[1]; //group
        $args[] = $arguments[2]; //idle
        $args[] = $arguments[3]; //consumername

        parent::setArguments($args);
    }

    public function parseResponse($data)
    {
        $result = [];

        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
            if (is_array($data[$i])) {
                $result[$i] = $this->parseResponse($data[$i]);
            }

            if (array_key_exists($i + 1, $data)) {
                if (is_array($data[$i + 1])) {
                    $result[$data[$i]] = $this->parseResponse($data[++$i]);
                } else {
                    $result[$data[$i]] = $data[++$i];
                }
            }
        }

        return $result;
    }
}
