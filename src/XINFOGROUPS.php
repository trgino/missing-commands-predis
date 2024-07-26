<?php

namespace MissingPredis;

class XINFOGROUPS extends \Predis\Command\Command
{
    public function getId()
    {
        return 'XINFO GROUPS';
    }

    public function setArguments(array $arguments)
    {
        $args = [];
        $args[] = $arguments[0]; //steamname

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
