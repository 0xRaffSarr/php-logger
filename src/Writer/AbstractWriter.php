<?php
/**
 * PHP Logger Writer Abstract: Defines the abstract for log writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger\Writer;

abstract class AbstractWriter implements WriterInterface
{
    /**
     * Path to save log
     *
     * @var string
     */
    protected string $logPath;

    /**
     * Append data at end to file
     *
     * @var bool
     */
    protected bool $append = false;

    public function __construct(string $path, bool $append = false)
    {
        $this->logPath = $path;
        $this->append = $append;
    }

    /**
     * Return path to save log
     *
     * @return string|null
     */
    public function getLogPath(): ?string {
        return $this->logPath;
    }

    /**
     * Set append data to file
     *
     * @param bool $append
     * @return void
     */
    public function setAppend(bool $append) {
        $this->append = $append;
    }

    /**
     * Return append data to file status
     *
     * @return bool
     */
    public function getAppend(): bool {
        return $this->append;
    }
}