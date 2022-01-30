<?php

/**
 * PHP Logger Json Writer: Defines log json writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger\Writer;

use PhpLogger\Log\LogInterface;

class JsonWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function write(LogInterface $log): bool
    {
        $file = $this->getLogPath().'/logs.json';

        //check path or create dir
        if(!is_dir($this->getLogPath())) mkdir($this->getLogPath(), 0777, true);

        $data = (file_exists($file) ? file_get_contents($file) : null);
        //if data is empty, init array, otherwise decode data
        $data = (empty($data)) ? [] : json_decode($data, true);


        if($this->getAppend()) {
            //add log data to end of file
            $data[] = $log->toArray();
        }
        else {
            //add log data to start of file
            array_unshift($data, $log->toArray());
        }

        $written = file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);

        return ($written !== false && $written > 0);
    }
}