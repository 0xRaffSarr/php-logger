<?php

/**
 * PHP Logger Writer Interface: Defines the interface for log writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger\Writer;

interface WriterInterface
{
    /**
     * Write log on file
     *
     * @param string $log
     * @return bool
     */
    public function write(string $log): bool;
}