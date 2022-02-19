<?php
/**
 * PHP Logger: Defines the Logger Object
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package PhpLogger
 */


namespace PhpLogger;

use PhpLogger\Log\Log;
use PhpLogger\Writer\WriterFactory;
use PhpLogger\Writer\WriterInterface;
use Psr\Log\AbstractLogger;


class Logger extends AbstractLogger
{
    /**
     * Logger writer instance
     *
     * @var WriterInterface
     */
    protected WriterInterface $writer;

    /**
     * Path to save log
     *
     * @var string
     */
    protected string $path;

    /**
     * Log type
     *
     * @var string
     */
    protected string $logType = 'text';

    /**
     * @param string $path
     * @param string $type
     * @throws Exception\WriterNotFoundException
     * @throws \ReflectionException
     */
    public function __construct(string $path, string $type = 'text') {
        $this->path = $path;
        $this->logType = $type;

        $this->writer = WriterFactory::getWriterInstance($type, $path);
    }

    /**
     * Set append method for write log
     *
     * @since 2.0.0
     * @param bool $append
     * @return void
     */
    public function append(bool $append) {
        $this->writer->setAppend($append);
    }

    /**
     *
     * @since 1.0.0
     * @param $level
     * @param \Stringable|string $message
     * @param array $context
     * @return void
     */
    public function log($level, \Stringable|string $message, array $context = [])
    {
        $log = (new Log())->setLogLevel($level)->setMessage($message)->setContext($context);

        $this->writer->write($log);
    }
}