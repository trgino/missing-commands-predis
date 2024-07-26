new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
], [
    'commands' => [
        'xack' => '\MissingPredis\XACK',
        'xgroupdestroy' => '\MissingPredis\XGROUPDESTROY',
    ],
]);