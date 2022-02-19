# PhpLogger

A php logger based on [`psr/log`](https://github.com/php-fig/log) interface.

## Installation

The package can be installed via Composer:

```bash
composer require xraffsarr/php-logger
```
## Configuration

FOr usage via Facade pattern within the project, you only need to indicate the path
to save the log

```php
use PhpLogger\Facade\Log;

Log::setLogPath('[pathToSave]');
```

Replacing  `pathToSave` with the desired path.

You can configure the type of log and the method to. If you want the logs to be saved in JSON format,
you can set the JSON writer with.

```php
use PhpLogger\Facade\Log;
use PhpLogger\LoggerType;

Log::setLogType(LoggerType::JSON_WRITER);
```
In that case the resulting file `log.json`, will contain an array of JSON objects in the format:

```json
{
    "date_time": "19\/02\/2022 14:47:50",
    "level": "emergency",
    "message": "Test debug logger Facade",
    "context": {
        "user": {
            "name": "Mario",
            "surname": "Rossi"
        },
        "data": [
            "a",
            "b",
            {
                "t": "a",
                "a": "b"
            }
        ]
    }
}
```

## Usage

The Logger can be used via Facade or instantiating a logger with its own configurations.

### Via Facade

You can use the logger via Facade, simply by invoking the desired methods related to the type of log.

```php
use PhpLogger\Facade\Log;

Log::debug('Debug log', [
    'data' => [
        ...
    ]
]);
```