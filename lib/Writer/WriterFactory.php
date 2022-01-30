<?php

/**
 * PHP Logger Writer Factory: Defines the factory for log writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger\Writer;

use PhpLogger\Exception\WriterNotFoundException;
use PhpLogger\LoggerType;

abstract class WriterFactory
{
    /**
     * @var string[]
     */
    protected static array $writers = [
        LoggerType::LOG_WRITER => TextWriter::class,
        LoggerType::JSON_WRITER => JsonWriter::class
    ];

    /**
     * Returns the writer associated with the type if any
     *
     * @param string $type
     * @return string
     * @throws WriterNotFoundException
     */
    public static function getWriter(string $type): string
    {
        if(key_exists($type, self::$writers)) {
            return self::$writers[$type];
        }

        throw new WriterNotFoundException($type);
    }

    /**
     * Return Writer instance
     *
     * @param string $type
     * @param string $path
     * @return WriterInterface
     * @throws WriterNotFoundException|\ReflectionException
     */
    public static function getWriterInstance(string $type, string $path): WriterInterface
    {
        $class = new \ReflectionClass(self::getWriter($type));

        return $class->newInstanceArgs([$path]);
    }
}