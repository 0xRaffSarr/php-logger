<?php

/**
 * PHP Logger Type: Defines the logger type constants
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger;

abstract class LoggerType
{
    public const LOG_WRITER = 'txt';
    public const JSON_WRITER = 'json';
}