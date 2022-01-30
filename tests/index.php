<?php

require __DIR__.'/../vendor/autoload.php';

use PhpLogger\Logger;

$logger = new Logger('log/', \PhpLogger\LoggerType::JSON_WRITER);

$logger->append(false);

$logger->emergency('Test debug logger', [
    'user' => [
        'name' => 'Mario',
        'surname' => 'Rossi'
    ],
    'data' => ['a','b',[
        't' => 'a',
        'a' => 'b'
    ]]
]);