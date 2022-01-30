<?php

/**
 * PHP Logger Writer Interface: Defines the interface for log writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace lib\Writer;

use lib\Log\Log;
use lib\Log\LogInterface;

interface WriterInterface
{
    /**
     * Write log on file
     *
     * @param Log $log
     * @return bool
     */
    public function write(LogInterface $log): bool;

    /**
     * Set if append at end of file
     *
     * @param bool $append
     * @return mixed
     */
    public function setAppend(bool $append);

    /**
     * Get append status
     *
     * @return bool
     */
    public function getAppend(): bool;
}