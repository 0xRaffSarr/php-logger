<?php
/**
 * PHP Logger: Defines the Logger Facade
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Facade
 */


namespace PhpLogger\Facade;

use PhpLogger\Facade\Concerns\LoggerTrait;

/**
 * PHP Logger: Facade
 *
 * @since 2.0.0
 * @author Raffaele Sarracino
 */
abstract class Log
{
    use LoggerTrait;

    /**
     * System is unusable.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function emergency(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->emergency($message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function alert(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->alert($message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function critical(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->critical($message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function error(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->error($message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function warning(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->warning($message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function notice(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->notice($message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function info(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->info($message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
    public static function debug(string|\Stringable $message, array $context = [])
    {
        self::getLogger()->debug($message, $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string|\Stringable $message
     * @param array $context
     *
     * @return void
     * @throws \PhpLogger\Exception\PathNotFoundException
     * @throws \PhpLogger\Exception\WriterNotFoundException
     * @throws \ReflectionException
     * @since 2.0.0
     *
     */
     public static function log(mixed $level, string|\Stringable $message, array $context = [])
     {
         self::getLogger()->log($level, $message, $context);
     }

}