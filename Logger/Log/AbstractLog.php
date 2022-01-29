<?php
/**
 * PHP Log abstract: Defines the abstract Log object
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Log
 */

namespace PhpLogger\Log;


use DateTime;

abstract class AbstractLog implements LogInterface
{

    /**
     * @var DateTime
     */
    protected DateTime $time;
    /**
     * Log level
     * @var string
     */
    protected string $logLevel;
    /**
     * @var string
     */
    protected string $message;
    /**
     * @var array
     */
    protected array $context;

    /**
     * The format string for DateTime object conversion
     *
     * @var string
     */
    protected $dateTimeFormat  = 'd/m/Y H:i:s';

    /**
     * @inheritDoc
     */
    public function setTime(\DateTime $time): LogInterface
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * Return formatted log time
     *
     * @param string|null $format
     * @return string|null
     */
    public function getFormattedTime(string $format = null): ?string
    {
        if(!is_null($this->time)) {
            return $this->time->format($format ?? $this->dateTimeFormat);
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function setMessage(string $message): LogInterface
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @inheritDoc
     */
    public function setContext(array $context): LogInterface
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getContexts(): array
    {
        return $this->context;
    }
}