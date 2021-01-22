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
    /**
     * @var string
     */
    private $logPath;

    /**
     * @var bool
     */
    protected $appendToFile = true;
    
    /**
     * @var bool
     */
    protected $json = true;

    /**
     * Logger constructor.
     *
     * @param string|null $path the path of the log files. If it is null logs are not generated
     *                          If it is not null, check that path is a dir with write permissions
     *
     * @param bool $appendToFile if append is true, the log is added at the end of file, else, the log is added at
     *                          start of file
     *
     * @param bool $json    If json is true, the log is saved as json, else as string
     *
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
     * If the append option is set to true, the data is append to endo of file, else append to start of file.
     * Return it self
     *
     * @param bool $append
     * @return $this
     */
    public function setAppendToFile(bool $append) {
        $this->appendToFile = $append;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAppendToFile() {
        return $this->appendToFile;
    }

    /**
     * If the json is set to true, log as saved as json, else as string.
     * Return it self
     *
     * @param bool $json
     * @return $this
     */
    public function setJson(bool $json) {
        $this->json = $json;

        return $this;
    }

    /**
     * @return bool
     */
    public function getJson() {
        return $this->json;
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

        if($this->getJson()) {
            $data = $log->jsonSerialize();
        }
        else {
            $data = $log->toString();
        }

        $this->writeLog($data);
    }

    /**
     * Generate a new Log object with the log data
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

        $file = $this->getPath().($this->getJson() ? '/logger.json' : '/logger.log');

        try {

            if($this->getAppendToFile()) {
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
     * Create a new instance of Logger if it not exist or return existing instance
     *
     * @param string|null $path the path of the log files. If it is null logs are not generated
     *                          If it is not null, check that path is a dir with write permissions
     *
     * @param bool $appendToFile if append is true, the log is added at the end of file, else, the log is added at
     *                          start of file
     *
     * @param bool $json    If json is true, the log is saved as json, else as string
     *
     * @return static
     *
     * @throws \Exception
     */
    public static function instance(string $path = null, bool $appendToFile = false, bool $json = false) {
        if(self::$instance || is_null($path)) {
            return self::$instance;
        }

        return self::$instance = new static($path, $appendToFile, $json);
    }
}
