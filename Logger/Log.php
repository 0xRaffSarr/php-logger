<?php
/**
 * Copyright (c) 2020.
 * Author: Raffaele Sarracino - https://raffaelesarracino.it
 */

namespace PhpLogger;
use DateTime;
use PhpLogger\LogContract;

class Log implements LogContract
{
    /**
     * @var DateTime
     */
    protected $time;
    /**
     * @var string
     */
    protected $level;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var array
     */
    protected $context;

    protected $dateTimeFormat  = 'd/m/Y H:i:s';

    /**
     * Log constructor.
     *
     * @param DateTime $time
     * @param $level
     * @param $message
     * @param array $context
     */
    public function __construct(DateTime $time, $level, $message, array $context) {
        $this->time = $time;
        $this->level = $level;
        $this->message = $message;
        $this->context = $context;
    }

    public function toArray()
    {
        return [
            'date_time' => (new DateTime())->format($this->dateTimeFormat),
            'level' => $this->level,
            'message' => $this->message,
            'context' => $this->context
        ];
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * Return a string format for log
     *
     * @return string
     */
    public function toString() {
        $str = $this->time->format($this->dateTimeFormat).' '.$this->level.' '.$this->message.' [';

        foreach ($this->context as $val) {
            $str .= ' '.$val;
        }

        $str .= ' ]';

        return $str;
    }
}
