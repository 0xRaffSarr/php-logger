<?php
/**
 * PHP Log: Defines log object
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Log
 */

namespace PhpLogger\Log;

use DateTime;

class Log extends AbstractLog
{
    public function __construct() {
        $this->time = new DateTime();
    }

    /**
     * Return an array with the log data
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'date_time' => (new DateTime())->format($this->dateTimeFormat),
            'level' => $this->logLevel,
            'message' => $this->message,
            'context' => $this->context
        ];
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return string|bool data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize(): string|bool
    {
        return json_encode($this->toArray());
    }

    /**
     * Return a string format for log
     *
     * @return string
     */
    public function toString(): string
    {
        $str = '[ '.$this->getFormattedTime().' - '.$this->logLevel.' ] '.$this->message.PHP_EOL;

        if(!empty($this->context)) {
            $str .= var_export($this->context, true);
        }

        return $str.PHP_EOL;
    }
}
