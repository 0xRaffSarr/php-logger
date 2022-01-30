<?php

/**
 * PHP Logger Text Writer: Defines log text writer
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Writer
 */

namespace PhpLogger\Writer;

use PhpLogger\Log\LogInterface;

class TextWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function write(LogInterface $log): bool
    {
        $file = $this->getLogPath().'/logs.log';

        if(!is_dir($this->getLogPath())) mkdir($this->getLogPath(), 0777, true);

        try {

            if($this->getAppend()) {
                //append data at end of file
                $written = file_put_contents($file, $log->toString().PHP_EOL , FILE_APPEND | LOCK_EX);
            }
            else {
                $oldData = (file_exists($file) ? file_get_contents($file) : '');
                //append data to start of file
                $written = file_put_contents($file, $log->toString().PHP_EOL.$oldData, LOCK_EX);
            }

        }
        catch (\Exception $e) {
            $written = false;
        }

        return ($written !== false && $written > 0);
    }
}