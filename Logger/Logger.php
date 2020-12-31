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

    protected $appendToFile = true;

    protected $json = true;

    /**
     * Logger constructor.
     *
     * @param string|null $path the path of the log files. If it is null logs are not generated
     *                          If it is not null, check that path is a dir with write permissions
     * @param bool $appendToFile
     * @param bool $json
     * @throws \Exception
     */
    private function __construct(string $path = null, bool $appendToFile = false, bool $json = false) {

        $this->appendToFile = $appendToFile;
        $this->json = $json;

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

    /**
     * Generate a log
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $log = $this->generateLog($level, $message, $context);

        if($this->json) {
            $data = $log->jsonSerialize();
        }
        else {
            $data = $log->toString();
        }

        $this->writeLog($data);
    }

    /**
     * Generate the log data structure
     *
     * @param $level
     * @param $message
     * @param array $context
     * @return Log
     */
    private function generateLog($level, $message, array $context) {
        //generate base log info
        return new Log((new \DateTime()), $level, $message, $context);
    }

    /**
     * Write the data on the log file
     *
     * @param string $data
     * @return bool
     */
    private function writeLog(string $data) {
        $file = $this->getPath().'/logger.log';
        try {

            if($this->appendToFile) {
                //append data at end of file
                $written = file_put_contents($file, $data.PHP_EOL , FILE_APPEND | LOCK_EX);
            }
            else {
                $oldData = (file_exists($file) ? file_get_contents($file) : '');
                //append data to start of file
                $written = file_put_contents($file, $data.PHP_EOL.$oldData, LOCK_EX);
            }

        }
        catch (\Exception $e) {
            $written = false;
        }

        return ($written !== false && $written > 0);
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
