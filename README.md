# php-logger

A simple php logger based on [`psr/log`](https://github.com/php-fig/log) interface.

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
    use lib\Logger;

    class Foo {
        private $logger;
        
        private $logPath = ''; //folder for saving logs
        
        public function __construct() {
            $this->logger = Logger::instance($this->logPath);
        }
        
        public function doSomething() {
            $this->logger->info('log message', ['context' => 'data']);
        }
    }
```

The instance method can thow an Exception if the path isn't valid (es. it exists but isn't a directory or not writable). If the path not exists, it is created.

You can set the type of log with the set methods `setAppendToFile` and `setJson`. If `setAppendToFile` is set to true, the log is inserted to end of file, otherwise to the start of file.

While the `setJson` determines the format of the log. Set it to true to save the log in JSON format or to false (default) for a normal text file.
