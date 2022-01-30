<?php

/**
 * PHP Logger Writer Not Found Exception: Defines the exception for writer not found
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Exception
 */

namespace lib\Exception;


class WriterNotFoundException extends \Exception
{
    public function __construct(string $writer = "")
    {
        parent::__construct($writer.' writer not found!');
    }
}