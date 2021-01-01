# php-logger

A simple php logger base on [`psr/log`](https://github.com/php-fig/log) interface.

Installation
------------

```bash
composer require xraffsarr/php-logger
```

Usage
----

The Logger class adopts the singleton design pattern, for this reason, you can have only one instance.

You can make an instance and access to it, with static method `Logger::instance`.

```php
<?php
    use PhpLogger\Logger;

    class Foo {
        private $logger;
        
        private $logPath = ''; //folder for saving logs
        
        public function __construct() {
            $this->logger = Logger::instance($logPath);
        }
        
        public function doSomething() {
            $this->logger->info('log message', ['context' => 'data']);
        }
    }
```

The instance method can thows an Exception if the path isn't valid (es. it exists but isn't a directory or not writable). If the path not exists, it is created.