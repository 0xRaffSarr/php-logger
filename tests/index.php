<?php

require __DIR__.'/../vendor/autoload.php';

use PhpLogger\Facade\Log;
use PhpLogger\LoggerType;

Log::setLogPath(__DIR__.'/log/');
Log::setLogType(LoggerType::JSON_WRITER);
Log::append(false);


Log::emergency('Test debug logger Facade', [
    'user' => [
        'name' => 'Mario',
        'surname' => 'Rossi'
    ],
    'data' => ['a','b',[
        't' => 'a',
        'a' => 'b'
    ]]
]);