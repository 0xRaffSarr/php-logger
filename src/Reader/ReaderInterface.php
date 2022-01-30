<?php

/**
 * PHP Logger Reader Interface: Defines the interface for log writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Reader
 */

namespace PhpLogger\Reader;

interface ReaderInterface
{
    /**
     * Read log on file
     *
     */
    public function read();
}