<?php
/**
 * Copyright (c) 2020.
 * Author: Raffaele Sarracino - https://raffaelesarracino.it
 */

namespace PhpLogger;


interface LogContract extends \JsonSerializable
{
    public function toArray();
    public function toString();
}
