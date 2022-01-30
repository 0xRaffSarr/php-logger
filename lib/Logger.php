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
use PhpLogger\Reader\ReaderInterface;
use PhpLogger\Writer\JsonWriter;
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
     * @var ReaderInterface
     */
    protected ReaderInterface $reader;

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

    public function __construct(string $path, string $type) {
        $this->path = $path;
        $this->logType = $type;

        $this->writer = WriterFactory::getWriterInstance($type, $path);
    }

    public function append(bool $append) {
        $this->writer->setAppend($append);
    }

    /**
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