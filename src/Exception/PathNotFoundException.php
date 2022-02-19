<?php
/**
 * PHP Logger Path not found exception
 *
 * @link  https://github.com/0xRaffSarr/php-logger
 * @copyright Copyright (c) 2022. Raffaele Sarracino <contacts@raffaelesarracino.it>
 * @license https://github.com/0xRaffSarr/php-logger/blob/main/LICENSE
 * @package Exception
 */

namespace PhpLogger\Exception;

/**
 * Path not found exception
 *
 * @since 2.0.0
 */
class PathNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Path not found');
    }
}