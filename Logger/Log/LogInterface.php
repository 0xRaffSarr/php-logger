<?php
/**
 * PHP Logger Interface: Defines the interface for log object
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Logger
 */

namespace PhpLogger\Log;

interface LogInterface extends \JsonSerializable
{
    /**
     * Set DateTime of Log and return log object
     *
     * @param \DateTime $time
     * @return LogInterface
     */
    public function setTime(\DateTime $time): LogInterface;

    /**
     * Get DateTime of Log
     *
     * @return \DateTime
     */
    public function getTime(): \DateTime;

    /**
     * Set log message and return Log object
     *
     * @param string $message
     * @return LogInterface
     */
    public function setMessage(string $message): LogInterface;

    /**
     * Return log message
     *
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * Set log context and return Log object
     *
     * @param array $context
     * @return LogInterface
     */
    public function setContext(array $context): LogInterface;

    /**
     * Get log context
     *
     * @return array
     */
    public function getContexts():array;

    /**
     * Return object as array
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Return object as string
     *
     * @return string
     */
    public function toString(): string;
}