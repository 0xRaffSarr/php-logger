<?php

/**
 * Copyright (c) 2020.
 * Author: Raffaele Sarracino - https://raffaelesarracino.it
 */

namespace PhpLogger;

use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    private static $instance;

    private $logPath;

    /**
     * Logger constructor.
     *
     * @param string|null $path the path of the log files. If it is null logs are not generated
     *                          If it is not null, check that path is a dir with write permissions
     * @throws \Exception
     */
    private function __construct(string $path = null) {
        if(!is_null($path)) {
            $this->setPath($path);
        }
    }

    /**
     * Set the log path, if it exists check that it is a directory and can write in it.
     * If it not exists, create a dir.
     *
     * @param string $path
     * @throws \Exception
     */
    public function setPath(string $path){
        if(file_exists($path)) {
            if(!is_dir($path)) {
                throw new \Exception('The path is not a directory');
            }

            if(!is_writable($path)) {
                throw new \Exception('Unable to write to directory');
            }
        }
        else {
            mkdir($this->logPath);
        }

        $this->logPath = $path;
    }

    /**
     * Return the path of directory
     *
     * @return mixed
     */
    public function getPath() {
        return $this->logPath;
    }

    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
    }

    /**
     * @param string|null $path
     * @return static
     * @throws \Exception
     */
    public static function instance(string $path = null) {
        if(self::$instance || is_null($path)) {
            return self::$instance;
        }

        return self::$instance = new static($path);
    }
}
