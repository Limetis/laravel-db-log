<?php

namespace Limetis\LaravelDBLogger\Loggers;

use App\Logging\Handlers\MariaDbLoggingHandler;
use Monolog\Logger;

class MariaDbLogger
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('MariaDbLoggingHandler');

        return $logger->pushHandler(new MariaDbLoggingHandler());
    }
}
