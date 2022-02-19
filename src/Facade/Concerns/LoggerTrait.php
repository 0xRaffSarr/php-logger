<?php
/**
 * PHP Logger Trait: Defines operation for Logger Facade
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Facade
 */


namespace PhpLogger\Facade\Concerns;

use PhpLogger\Exception\PathNotFoundException;
use PhpLogger\Logger;
use PhpLogger\LoggerType;

/**
 * PHP Logger: LoggerTrait for facade
 *
 * @since 2.0.0
 * @author Raffaele Sarracino
 */
trait LoggerTrait
{
    /**
     * @var Logger|null
     */
    protected static ?Logger $logger = null;

    protected static ?string $logPath = null;

    /**
     * Log type
     * Default text log type
     *
     * @since 2.0.0
     * @var string|null
     */
    protected static ?string $logType = LoggerType::LOG_WRITER;

    /**
     * Return an instance of Logger class
     *
     * @return Logger
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @throws PathNotFoundException
     * @since 2.0.0
     *
     */
    public static function getLogger(): Logger
    {
        //if path not set, throw exception
        if(is_null(self::getLogPath())) throw new PathNotFoundException();

        if(is_null(self::$logger)) {
            self::$logger = new Logger(self::getLogPath(), self::getLogType());
        }

        return self::$logger;
    }

    /**
     * Return path to save log
     *
     * @since 2.0.0
     * @return string|null
     */
    public static function getLogPath():?string
    {
        return self::$logPath;
    }

    /**
     * Set path to log
     *
     * @since 2.0.0
     * @param string $path
     * @return void
     */
    public static function setLogPath(string $path)
    {
        self::$logPath = $path;
    }
    /**
     * Return log type
     *
     * @since 2.0.0
     * @return string|null
     */
    public static function getLogType():?string
    {
        return self::$logType;
    }

    /**
     * Set log type
     *
     * @since 2.0.0
     * @param string $type
     * @return void
     */
    public static function setLogType(string $type)
    {
        self::$logType = $type;
    }
}